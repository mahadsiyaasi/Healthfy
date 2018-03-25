<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use Auth;
class labController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function lab()
      {
     $data  = OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
	->join("staff","staff.id","=","test_order_master.doctor_id")
	->join("varaible_lists","varaible_lists.status_id","=","test_order_detail.status_id")
	->join("patients","patients.id","=","test_order_master.patient_id")
	->join("tests","tests.id","=","test_order_detail.test_id")
	->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name","varaible_lists.status_id","test_order_detail.id","test_order_master.id as master_id")
	->where("test_order_detail.status_id",">",0)
	->where("test_order_master.status_id",">",0)
	->where("test_order_master.company_id",Auth::user()->company_id)
	->distinct('test_order_detail.id')
	->get();
        return view('lab.lab')->with("ordertest", $data);
    }
}
