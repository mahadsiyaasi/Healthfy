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
         }elseif ($request->input("table")=="OrderMaster") {
          $arra =\App\Models\OrderDetail::where('test_order_id',$request->input('id'))->update(['status_id'=>0]);
         }elseif ($request->input("table")=="OrderDetail") {
          $arra =\App\Models\OrderDetail::find($request->id);
          $arra->status_id = 0;
          $arra->save();
          $arra2 =\App\Models\OrderMaster::find($arra->test_order_id);
          $arra2->total_amount = ($arra2->total_amount*1)-($arra->amount*1);
          $arra2->save();
          #check if this detail order is last then stop header att all 
          $check =  \App\Models\OrderDetail::where('test_order_id',$arra->test_order_id)->where('status_id','>',0)->get();
                 if (empty($check[0])) {
                  $master = \App\Models\OrderMaster::find($arra->test_order_id);
                  $master->status_id = 0;
                  $master->save();
                }
         }

    	$data  = $table::find($request->input("id"));
    	$data->status_id=0;
    	$data->save();
    	$arrayName = array('success' =>" success full cencelled !");
    	return Response::json($arrayName);
    }
}
