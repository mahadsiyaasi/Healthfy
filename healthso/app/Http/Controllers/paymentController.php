<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Validator;
use Auth;
use Response;

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
				'status_id'=>1,
				'company_id'=>Auth::user()->company_id
			]);

		}elseif ($data->input('type')=="main") {
			PaymentMethod::create([
				"name"=>$data->input('name'),
				"provider_name"=>$data->input('provider'),
				"description"=>$data->input('desc'),
				'status_id'=>1,
				'company_id'=> Auth::user()->company_id
			]);
			
		}
		return Response::json(['success'=>'success full saved']);
	}
}
}
