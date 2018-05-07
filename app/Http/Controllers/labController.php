<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use DateTime;
use Response;

use App\Models\OrderMaster;
use App\Models\PaymentMethod;
use App\Models\Transuction;
use Validator;
use App\Http\Controller\medicationController;
use DB;
use App\Models\OrderDetail;
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
       ->join("varaible_lists", function ($join) {
        $join->on('varaible_lists.status_id', '=', 'test_order_detail.status_id');
             
        })
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name as detail_status","test_order_detail.status_id as detail_status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id","test_order_master.status_id as master_status_id","varaible_lists.status_name as master_status")

	->where("test_order_detail.status_id",">",0)
	->where("test_order_master.status_id",">",0)
	->where("test_order_master.company_id",Auth::user()->company_id)
	//->where("test_order_master.patient_id",$request->input("patient_id"))
	->get();
        return view('lab.lab')->with("ordertest",$data);
    }
    public  function filter(Request $filter)
    {
    if ($filter->has("status_id")) {
    $data = array('success'=>OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
       ->join("varaible_lists", function ($join) {
        $join->on('varaible_lists.status_id', '=', 'test_order_detail.status_id')
        ->on('varaible_lists.status_id', '=', 'test_order_master.status_id');
        })
   
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name as detail_status","test_order_detail.status_id as detail_status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id","test_order_master.status_id as master_status_id","varaible_lists.status_name as master_status")
    ->where("test_order_master.status_id","=",$filter->input('status_id'))
    ->where("test_order_detail.status_id",">",0)
    ->where("test_order_master.company_id",Auth::user()->company_id)
    ->distinct('test_order_detail.id')
    ->get());
        }
        elseif ($filter->has('tagtype')) {
            if ($filter->input('tagtype')=='test_detail') {
               $data = array('success'=>OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("varaible_lists","varaible_lists.status_id","=","test_order_detail.status_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name","varaible_lists.status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id")
    ->where("test_order_master.status_id",">",0)
    ->where("test_order_detail.status_id",">",0)
    ->where("test_order_detail.id","=",$filter->input('order_id'))
   ->where("test_order_master.patient_id","=",$filter->input('patient_id'))
    ->where("test_order_master.company_id",Auth::user()->company_id)
    ->distinct('test_order_detail.id')
    ->orderBy("test_order_detail.id")
    ->get(),
'payment'=>PaymentMethod::all());
            }else{
    $data = array('success'=>OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("varaible_lists","varaible_lists.status_id","=","test_order_detail.status_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name","varaible_lists.status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id")
    ->where("test_order_master.status_id",">",0)
    ->where("test_order_detail.status_id",">",0)
    ->where("test_order_master.id","=",$filter->input('order_id'))
    ->where("test_order_master.patient_id","=",$filter->input('patient_id'))
    ->where("test_order_master.company_id",Auth::user()->company_id)
    ->distinct('test_order_detail.id')
    ->get(),
'payment'=>PaymentMethod::all());
        }
    }
    elseif ($filter->has("date-form")){
        $dateform = (new DateTime($filter->input("date-from")))->format('Y-m-d h:m');
        $dateto = (new DateTime($filter->input("date-to")))->format('Y-m-d h:m');
    $data = array('success'=>OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
       ->join("varaible_lists", function ($join) {
        $join->on('varaible_lists.status_id', '=', 'test_order_detail.status_id')
        ->on('varaible_lists.status_id', '=', 'test_order_master.status_id');
            
        })
   
    ->join("staff","staff.id","=","test_order_master.doctor_id")
    ->join("patients","patients.id","=","test_order_master.patient_id")
    ->join("tests","tests.id","=","test_order_detail.test_id")
    ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name as detail_status","test_order_detail.status_id as detail_status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id","test_order_master.status_id as master_status_id","varaible_lists.status_name as master_status")
    ->where("test_order_detail.status_id",$filter->input('status_filter')?$filter->input('status_filter'):null)
    ->where("test_order_master.status_id",">",0)
     ->where("test_order_master.doctor_id",$filter->input('doctor_filter'))
    ->whereDate("test_order_master.date",">",$dateform?$dateform:null)
    ->whereDate("test_order_master.date","<",$dateto?$dateto:now())
    ->where("test_order_master.company_id",Auth::user()->company_id)
    ->distinct('test_order_detail.id')
    ->get());
}else{
    $data  = OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
       ->join("varaible_lists", function ($join) {
        $join->on('varaible_lists.status_id', '=', 'test_order_detail.status_id');
        })
        ->join("staff","staff.id","=","test_order_master.doctor_id")
        ->join("patients","patients.id","=","test_order_master.patient_id")
        ->join("tests","tests.id","=","test_order_detail.test_id")
        ->select("patients.patient_name","staff.name as doctor_name","staff.id as doctor_id","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name as detail_status","test_order_detail.status_id as detail_status_id","test_order_detail.id","test_order_master.id as master_id","patients.id as patient_id","test_order_master.status_id as master_status_id","varaible_lists.status_name as master_status")
        ->where("test_order_detail.status_id",">",0)
        ->where("test_order_master.status_id",">",0)
        ->where("test_order_master.company_id",Auth::user()->company_id)
        ->get();
}



    return Response::json($data);
}
public function labpayment(Request $data){
    $valid =  Validator::make($data->all(),[
               'total_amount'=>"required|min:1|numeric",
                'discount'=>"required|numeric",
                'curency'=>"required|min:1|numeric",
                'accountpay'=>"required|min:1",
                 'remark'=>"required|min:1"
    ]);
    if ($valid->fails()) {
       return Response::json($valid->messages());
    }else{
        if ($data->input("tagtype")=="test_detail") {
            $row =  OrderDetail::find($data->input('order_id'));
            $row->status_id = 3;
            $row->save();
        }else{
            $row =OrderMaster::find($data->input('order_id'));
            $row->status_id = 3;
            $row->save();
            $row2 =OrderDetail::where('test_order_id',$data->input('order_id'))->update(['status_id'=>3]);
           }
        self::paymenttran($data);
        return Response::json(['success'=>'Transuction saved success full !']);
    }

}
public function paymenttran($data){
    $check = Transuction::create([
        'patient_id'=>$data->input('patient_id'),  
        'date'=>date('Y-m-d H:i:s'),
        'amount'=>$data->input('total_amount'),
        'discount'=>$data->input('discount'),
        'balance'=>$data->input('curency'),
        'order_id'=>$data->input('order_id'),
        'order_type'=>"TestOrderPayment",
        'trunsaction_type'=>"Payment",
        'status_id'=>1,
        'account'=>$data->input('accountpay'),
        "company_id"=>Auth::user()->company_id
    ]);
    if ($check) {
       return true;
    }else{
    return false;
}
}
}

