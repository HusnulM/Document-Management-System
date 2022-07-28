<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables, Auth, DB;
use Validator,Redirect,Response;

class DoctypeController extends Controller
{
    public function index(){
        // $data = DB::table('doctypes')->get();
        // return view('master.doctype.index', ['doctype' => $data]);
        return "Document Types";
    }
}
