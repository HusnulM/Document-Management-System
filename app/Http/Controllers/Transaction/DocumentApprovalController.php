<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables, Auth, DB;
use Validator,Redirect,Response;

class DocumentApprovalController extends Controller
{
    public function index(){
        // return getLocalDatabaseDateTime();
        $documents  = DB::table('v_document_approvals')
                      ->where('approver_id', Auth::user()->id)
                      ->where('approval_status', 'N')
                      ->orderBy('created_at', 'DESC')
                      ->get();
        return view('transaction.documentapproval.index', ['documents' => $documents]);
    }

    public function approveDetail($id){
        $documents  = DB::table('v_documents')
                      ->where('id', $id)
                      ->first();
        // return $documents;
        return view('transaction.documentapproval.detail', ['documents' => $documents]);   
    }

    public function approve(){

    }
}
