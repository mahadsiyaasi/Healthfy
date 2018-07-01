<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderMaster;
use Auth;
use PDF;

class printController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function print(Request $req)
    {
    	$Result= OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
    	->join("transactions","transactions.order_id","=","test_order_master.id")
       ->join("varaible_lists", function ($join) {
        $join->on('varaible_lists.status_id', '=', 'test_order_detail.status_id');             
        })
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.*","transactions.*","staff.name as doctor_name",'staff.*',"test_order_detail.test_id","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name as detail_status","test_order_detail.status_id as detail_status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id","test_order_master.status_id as master_status_id","varaible_lists.status_name as master_status","test_order_detail.ranges","test_order_detail.units","test_order_detail.result","test_order_detail.note")
    ->where("test_order_master.status_id","=",$req->status_id)
    ->where("test_order_detail.status_id","=",$req->status_id)
    ->where("test_order_master.id","=",$req->_id)
    ->where("test_order_master.patient_id","=",$req->patient_id)
    ->where("test_order_master.company_id",Auth::user()->company_id)
    ->distinct('test_order_detail.id')
    ->get();
    $contxt = stream_context_create([
		'ssl' => [
		'verify_peer' => FALSE,
		'verify_peer_name' => FALSE,
		'allow_self_signed'=> TRUE
		]
		]);
    $pdf = PDF::loadHtml(view('print.print',compact('Result', 'Result')));
    $pdf->setPaper('A4', 'portrait');
    $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    $pdf->getDomPDF()->setHttpContext($contxt);
    if ($req->action=="download") {
    	return $pdf->download($Result[0]->patient_name.$Result[0]->date.'.pdf');
    }else{
		return $pdf->stream($Result[0]->patient_name.$Result[0]->date.'.pdf');
    }
      
	
    		///return View('print.print')->with("Result",$data);
    } 
}
