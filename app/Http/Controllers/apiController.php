<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Models\Patient;
use App\Http\Controllers\labController;
class apiController extends Controller
{
	
	public function users()
	{
		return response()->json(User::all(),200);
	}
	public function login(Request $req)
	{
	//$credentials = $req->only('email', 'password');

        return response()->json($req->email);
	}
	 public function gethome()
    {
      return View("register.patients.register");
    }
    public function registerOutPatient(Request $data){
    	$validate = Validator::make($data->all(),[
    		"fullname"=>"required|min:5|string|",
			"phone"=>"required|min:9|numeric|unique:users|unique:patients,patient_tell",
			 "email"=>"required|min:5|email|unique:users",
			"country"=>"required|min:2|string",
			"city"=>"required|min:2|string",
			"gender"=>"required|min:1|string",
			"password"=>"required|min:6"
    	]);
    	if ($validate->fails()) {
    		return response()->json($validate->messages());
    	}else{
    		$id = User::insertGetId([
    			'name'=> $data->fullname, 
		        'email'=> $data->email, 
		        'password'=>bcrypt($data->password), 
		        'status_id'=>1,
		        'default_language_id'=>1,
		        'company_id'=>0,
		        'mobile'=> $data->phone,
		        'phone'=> $data->phone,
		        'address'=>0,
		        'city'=> $data->city,
		        'country'=> $data->country,
		        'default_cash_account_id'=> 0,
		        'role_type_id'=>1,
		        'date'=>date('Y-m-d H:i:s'),
		        'updated_date'=>date('Y-m-d H:i:s'),
		        'registered_by'=>0,
		        'remember_token'=>$data->_token,
    		]);
    		$da = Patient::create([
    			'patient_name'=>$data->fullname,
		        'country'=>$data->country,
		        'state'=>$data->city,
		        'district'=>null,
		        'address'=>null,
		        'patient_tell'=>$data->phone,
		        'datebirth'=>null,
		        'gender'=>$data->gender,
		        'date'=>date('Y-m-d H:i:s'),
		        "user_id"=>$id,
		        "status_id"=>1,
		        "company_id"=>1,
		    	]);
    		return labController::getMessages('success','success.success');

    	}
    }
    public function checkvalidationpatientRegister(Request $data){
		    if ($data->has('email')) {
		    	 $validate1 = Validator::make($data->all(),[
		    	 	 $data->field=>"required|min:6|email|unique:users",
		    	]);
		    	 if ($validate1->fails()) {
		    	 	return response()->json($validate1->messages());
		    	 }else{
		    	 	return response()->json(["success"=>'true']);
		    	 }
		   	 }
			   	 elseif ($data->has('phone')) {
			    	 $validate2 = Validator::make($data->all(),[
			    	 	 $data->field=>"required|min:9|unique:users|unique:patients,patient_tell"
			    	]);
			    	 if ($validate2->fails()) {
			    	 	return response()->json($validate2->messages());
			    	 }else{
			    	 	return response()->json(["success"=>'true']);
			    	 }
			   	 }
			   	 elseif ($data->has('gender')) {
			    	 $validate2 = Validator::make($data->all(),[
			    	 	 $data->field=>"required|min:2"
			    	]);
			    	 if ($validate2->fails()) {
			    	 	return response()->json($validate2->messages());
			    	 }else{
			    	 	return response()->json(["success"=>'true']);
			    	 }
			   	 } elseif ($data->has('password')) {
			    	 $validate2 = Validator::make($data->all(),[
			    	 	 $data->field=>"required|min:8"
			    	]);
			    	 if ($validate2->fails()) {
			    	 	return response()->json($validate2->messages());
			    	 }else{
			    	 	return response()->json(["success"=>'true']);
			    	 }
			   	 }
		   	 else{
		    	 	$validate3 = Validator::make($data->all(),[
		    	 	$data->field=>"required|min:5"
		    	]);
		    	 if ($validate3->fails()) {
		    	 	return response()->json($validate3->messages());
		    	 }else{
		    	 	return response()->json(["success"=>'true']);
		    	 }
		    
		   	 }
   
    }
}
