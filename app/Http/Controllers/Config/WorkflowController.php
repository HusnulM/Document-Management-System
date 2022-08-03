<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables, Auth, DB;
use Validator,Redirect,Response;

class WorkflowController extends Controller
{
    public function index(){
        $menus  = DB::table('menus')
                    ->select('menus.id','menus.name','menus.route','menus.menugroup', 'menugroups.menugroup as group', 'menus.menu_idx')
                    ->join('menugroups','menus.menugroup','=','menugroups.id')
                    ->orderBy('menugroups._index', 'ASC')
                    ->orderBy('menus.menu_idx', 'ASC')
                    ->get();

        $groups = DB::table('workflow_groups')->orderBy('id', 'ASC')->get();
        return view('config.approval.index', ['menus' => $menus, 'groups' => $groups]);
    }

    public function saveGroup(Request $req){
        DB::beginTransaction();
        try{
            $wfgroups   = $req['wfgroups'];

            $insertData = array();
            for($i = 0; $i < sizeof($wfgroups); $i++){
                $menus = array(
                    'workflow_group' => $wfgroups[$i],
                    'createdon'      => date('Y-m-d H:m:s'),
                    'createdby'      => Auth::user()->email ?? Auth::user()->username
                );
                array_push($insertData, $menus);
            }
            insertOrUpdate($insertData,'workflow_groups');
            DB::commit();
            return Redirect::to("/config/workflow")->withSuccess('New Workflow Group Created');
        } catch(\Exception $e){
            DB::rollBack();
            return Redirect::to("/config/workflow")->withError($e->getMessage());
        }
    }

    public function deleteGroup($id){
        DB::beginTransaction();
        try{
            DB::table('workflow_groups')->where('id', $id)->delete();
            DB::commit();
            return Redirect::to("/config/workflow")->withSuccess('Workflow Group Deleted');
        } catch(\Exception $e){
            DB::rollBack();
            return Redirect::to("/config/workflow")->withError($e->getMessage());
        }
    }
}
