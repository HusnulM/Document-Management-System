<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables, Auth, DB;
use Validator,Redirect,Response;

class DocumentController extends Controller
{
    public function index(){
        $doctypes  = DB::table('doctypes')->get();
        $doclevels = DB::table('doclevels')->get();
        $docareas  = DB::table('docareas')->get();
        return view('transaction.document.index', ['doctypes' => $doctypes, 'doclevels' => $doclevels, 'docareas' => $docareas]);
    }

    public function save(Request $req){
        // return generateDcnNumber();
        // return public_path();
        DB::beginTransaction();
        try{
            $this->validate($req, [

                'docfiles'   => 'required',
                // 'filename.*' => 'mimes:doc,pdf,docx,zip'

            ]);

            $files = $req['docfiles'];
            
            $dcnNumber = generateDcnNumber();
            $wfgroup   = getWfGroup($req['doctype']);

            $docHistory = array();
            $insertFiles = array();

            DB::table('documents')->insert([
                'dcn_number'      => $dcnNumber,
                'document_type'   => $req['doctype'],
                'document_level'  => $req['doclevel'],
                'document_number' => $req['docnumber'],
                'document_title'  => $req['doctitle'],
                'description'     => $req['docremark'],
                'workflow_group'  => $wfgroup,
                'effectivity_date'=> $req['effectivedate'],
                'created_at'      => getLocalDatabaseDateTime(),
                'createdby'       => Auth::user()->email ?? Auth::user()->username
            ]);

            // document_historys
            
            $insertHistory = array(
                'dcn_number'        => $dcnNumber,
                'activity'          => 'New Document Created : ' . $req['doctitle'],
                'createdby'         => Auth::user()->email ?? Auth::user()->username,
                'createdon'         => getLocalDatabaseDateTime(),
                'updatedon'         => getLocalDatabaseDateTime()
            );
            array_push($docHistory, $insertHistory);

            foreach ($files as $efile) {
                $filename = $dcnNumber.'-'.$efile->getClientOriginalName();
                $upfiles = array(
                    'dcn_number' => $dcnNumber,
                    'doc_version'=> 1,
                    'efile'      => $filename,
                    'created_at' => getLocalDatabaseDateTime(),
                    'createdby'  => Auth::user()->email ?? Auth::user()->username
                );
                array_push($insertFiles, $upfiles);

                $efile->move(public_path().'/files/', $filename);  

                $insertHistory = array(
                    'dcn_number'        => $dcnNumber,
                    'activity'          => 'Document Attachment Created : ' . $filename,
                    'createdby'         => Auth::user()->email ?? Auth::user()->username,
                    'createdon'         => getLocalDatabaseDateTime(),
                    'updatedon'         => getLocalDatabaseDateTime()
                );
                array_push($docHistory, $insertHistory);
            }

            // return $insertFiles;

            

            // Document Affected Areas | document_affected_areas
            $docareas = $req['docareas'];
            $insertAreas = array();
            for($i = 0; $i < sizeof($docareas); $i++){
                $areas = array(
                    'dcn_number'        => $dcnNumber,
                    'docarea'           => $docareas[$i],
                    'createdon'         => getLocalDatabaseDateTime(),
                    'createdby'         => Auth::user()->email ?? Auth::user()->username
                );
                array_push($insertAreas, $areas);
            }
            if(sizeof($insertAreas) > 0){
                insertOrUpdate($insertAreas,'document_affected_areas');
            }

            // Generate Document Approval Workflow
            $wfapproval = DB::table('v_workflow_assignments')->where('workflow_group', $wfgroup)->get();
            $insertApproval = array();
            foreach($wfapproval as $key => $row){
                $approvals = array(
                    'dcn_number'        => $dcnNumber,
                    'approval_version'  => 1,
                    'workflow_group'    => $wfgroup,
                    'approver_level'    => $row->approval_level,
                    'approver_id'       => $row->approverid,
                    'createdon'         => getLocalDatabaseDateTime(),
                    // 'createdby'         => Auth::user()->email ?? Auth::user()->username
                );
                array_push($insertApproval, $approvals);
            }
            insertOrUpdate($insertApproval,'document_approvals');

            // Insert Attchment Documents
            insertOrUpdate($insertFiles,'document_attachments');

            insertOrUpdate($docHistory,'document_historys');
            

            DB::commit();
            return Redirect::to("/transaction/document")->withSuccess('New Document Created With Number '. $dcnNumber);
        } catch(\Exception $e){
            DB::rollBack();
            return Redirect::to("/transaction/document")->withError($e->getMessage());
        }
    }
}
