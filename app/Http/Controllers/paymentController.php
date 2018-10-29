<?php

namespace Healthfy\Http\Controllers;

use Illuminate\Http\Request;
use Healthfy\Models\PaymentMethod;
use Validator;
use Auth;
use Response;
use Healthfy\Models\Transuction;
use Lang;
use Healthfy\Http\Controllers\authController;
use DataTables;
class paymentController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public static function home(){
    	return view('payment.payment')->with("payment",PaymentMethod::all());
    }

public function savepayment(Request $data){
	$validate =Validator::make($data->all(),[
		'desc'=>'required|min:2',
		"name"=>'required|min:2',
		"provider"=>'required|min:2',
		//"main"=>'required|min:2',
		
	]);
	if ($validate->fails()) {
		return Response::json($validate->messages());
	}else{
		if ($data->input('type')=="sub") {
			PaymentMethod::create([
				"name"=>$data->input('name'),
				"provider_name"=>$data->input('provider'),
				"description"=>$data->input('desc'),
				"parent_id"=>$data->input('parent_id'),
				'account'=>$data->input('account'),
				'user_id'=>Auth::user()->id,
				'status_id'=>1,
				'company_id'=>Auth::user()->company_id
			]);

		}elseif ($data->input('type')=="main") {
			PaymentMethod::create([
				"name"=>$data->input('name'),
				"provider_name"=>$data->input('provider'),
				"description"=>$data->input('desc'),
				'status_id'=>1,
				'user_id'=>null,
				'company_id'=> Auth::user()->company_id
			]);
			
		}
		return Response::json(['success'=>'success full saved']);
	}
}
public static function PaymentMethod(){
	$accountH = PaymentMethod::select("parent_id")->where("user_id",Auth::user()->id)->get();
	$hed = [];
	foreach ($accountH as $key => $value) {
		$hed []= PaymentMethod::where("id",$value)->first();
	}
	$all = new \stdClass();
	$all->head = $hed;
	$all->sub =  PaymentMethod::where("user_id",Auth::user()->id)->get();
	return PaymentMethod::all();
}
public function jsonPaymentMethod(Request $data){
	$pay =  new \stdClass();
	$pay->success = true;
	$doctor = \Healthfy\Models\Staff::find($data->doctor_id);
	$pay->payment =paymentMethod::where("user_id",$doctor->user_id)->get();
	return response()->json($pay);
}
public function appointpayment(Request $data){
	 $valid =  Validator::make($data->all(),[
               'total_amount'=>"required|min:1|numeric",
                'curency'=>"required|min:1|numeric",
                'accountpay'=>"required|min:1",
                 'remark'=>"required|min:1"
    ]);
    if ($valid->fails()) {
       return Response::json($valid->messages());
    }else{
          	$datas = \Healthfy\Models\Appointment::find($data->appoint_id);
        	$datas->status_id = 166;
        	$datas->save();
           self::paymenttran($data);            
        return Response::json(['success'=>Lang::get('success.success')]);
    }


}
public function paymenttran($data){
	$pay = PaymentMethod::where("account",$data->input('accountpay'))->first();
	$check = Transuction::create([
        'patient_id'=>$data->input('patient_id'),  
        'date'=>date('Y-m-d H:i:s'),
        'amount'=>$data->input('total_amount'),
        'discount'=>0,
        'balance'=>$data->input('curency'),
        'order_id'=>$data->input('appoint_id'),
        'doctor_id'=>$data->input('doctor_id'),
        'order_type'=>"AppointmentPayment",
        'trunsaction_type'=>"Payment",
        'status_id'=>1,
        'provider_name'=>$pay->provider_name,
        'payment_status_id'=>0,
        'account'=>$data->input('accountpay'),
        "company_id"=>Auth::user()->company_id
    ]);
    if ($check) {
       return true;
    }else{
    return false;
}
}
public function generalpays(){
	$transuction;
	if(authController::authType()==2){
		$transuction  =Transuction::where("patient_id",authController::authPatient()->id)->get();
	}elseif(authController::authType()==1){
		$transuction  =Transuction::where("doctor_id",authController::authdoctor()->id)->get();
	}
	
	return view("payment.pay");
	
}
public function patientpays(Request $data){
	$transuction  =Transuction::join("appointment","appointment.id","=","transactions.order_id")
	->join("varaible_lists","varaible_lists.status_id","=","appointment.status_id")
	->select("transactions.*","appointment.*","varaible_lists.status_name")
	->where("transactions.patient_id",authController::authPatient()->id)->get();
	return \DataTables::of($transuction)->make(true);
}

}
