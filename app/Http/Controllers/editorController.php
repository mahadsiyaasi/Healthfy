<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Tests;
use Response;

class editorController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function editor(Request $request){
    	return view("editor.editor");
    }
    public function cancels(Request $request){
    	$table ="App\Models\\".$request->input("table");
        if ($request->input("table")=="Doctor") {
          $table ="App\Models\Staff";
        }elseif ($request->input("table")=="PrescriptionList") {
          $arra =\App\Models\PrescriptionDetail::where('prescription_id',$request->input('id'))->update(['status_id'=>0]);
         }
    	$data  = $table::find($request->input("id"));
    	$data->status_id=0;
    	$data->save();
    	$arrayName = array('success' =>" success full cencelled !");
    	return Response::json($arrayName);
    }
}
