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
        $documents  = DB::table('v_documents')->get();
        return view('transaction.documentapproval.index', ['documents' => $documents]);
    }

    public function approve(){

    }
}
