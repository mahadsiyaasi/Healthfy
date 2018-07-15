<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Models\Patient;
use App\Http\Controller\labController;
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
    		return response()->json($validate->messages);
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
		        'address'=>null,
		        'city'=> $data->city,
		        'country'=> $data->country,
		        'default_cash_account_id'=> null,
		        'role_type'=>"Patient",
		        'date'=>date('Y-m-d H:i:s'),
		        'updated_date'=>date('Y-m-d H:i:s'),
		        'registered_by'=>null,
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
		        "company_id"=>null,
		    	]);
    		return labController::getMessages('success','success.success');

    	}
    }
}
