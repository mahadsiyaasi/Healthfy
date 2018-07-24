<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Models\Patient;
use App\Http\Controllers\labController;
use App\Models\Staff;
class apiController extends Controller
{
	private  $dataToserver;
	

	public function users()
	{
		return response()->json(User::all(),200);
	}
	public function login(Request $req)
	{
	//$credentials = $req->only('email', 'password');

        return response()->json($req->email);
	}
	 public function getpatientHome()
    {
      return View("register.patients.register");
    }
    public function getDoctorsHome(){

    	return View("register.doctors.register");
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
    public function saveOutDoctor(Request $data){
    	if ($data->fullname) {
    	$validate =  Validator::make($data->all(),[
    		"fullname"=>"required|min:4|string",
    		"email"=>"required|max:255|email|unique:users|unique:staff",
    		"phone"=>"required|min:9|numeric|unique:users|unique:staff,tell",
    	]);
    	if ($validate->fails()) {
    		 return redirect()->back()->withInput()->withErrors($validate);

    	}else{
    		$id = User::insertGetId([
    			'name'=>  $data->fullname, 
		        'email'=> $data->email, 
		        'phone'=>$data->phone, 
		        'status_id'=>1,
		        'default_cash_account_id'=> 0,
		        'status_id'=>1,
		        'default_language_id'=>1,
		        'company_id'=>0,
		        'role_type_id'=>1,
		        'date'=>date('Y-m-d H:i:s'),
		        'role_type_id'=>3,
		        'registered_by'=>0,
		        'remember_token'=>$data->_token
		    ]);
		    $doctor_id = Staff::insertGetId([
		    		 'name'=> $data->fullname,
			        'tell'=>  $data->phone,
			        'email'=>  $data->email,
			        'salary'=> 0,
			        "user_id"=> $id,
			        'type'=>"Doctor",
			        "status_id"=>1,
			        "company_id"=>0,
			       ]);
   		return redirect("/create/doctor?user_id=".$id."&doctor_id=".$doctor_id."&email=".$data->email."&phone=".$data->phone)->withInput()->withErrors($data);
    	}
    	}elseif ($data->speciality) {
    		$validate =  Validator::make($data->all(),[
    		"speciality"=>"required|min:4|string",
    		"degree"=>"required|min:2",
    		"gender"=>"required|min:2",
    	]);
    	if ($validate->fails()) {
    		 return redirect()->back()->withInput()->withErrors($validate);
    	}else{
   		  $staffdata = Staff::find($data->doctor_id);
		    $staffdata->gender=$data->gender;
    		$staffdata->specialization=$data->speciality;
    		$staffdata->degree= $data->degree;
    		$staffdata->save();
    		return redirect("/create/doctor?user_id=".$data->user_id."&doctor_id=".$data->doctor_id."&speciality=".$data->email."&phone=".$data->phone."&speciality=".$data->speciality)->withInput()->withErrors($data);
    	}
    	}
    	elseif ($data->country) {
    		$validate =  Validator::make($data->all(),[
    		"country"=>"required|min:4|string",
    		"city"=>"required|min:2",
    		"address"=>"required|min:2",
    	]);
    	if ($validate->fails()) {
    		 return redirect()->back()->withInput()->withErrors($validate);
    	}else{
    		$find = User::find($data->user_id);
    		$find->country = $data->country;//$this->dataToserver->country =
    		$find->city =$data->city;
    		$find->address =$data->address;
    		$find->save();
    		$staffdata = Staff::find($data->doctor_id);
    		$staffdata->nationality= $data->country;
    		$staffdata->address=$data->address;
    		$staffdata->save();    		
    		return redirect("/create/doctor?user_id=".$data->user_id."&country=".$data->country."&doctor_id=".$data->doctor_id)->withInput()->withErrors($data);
    	}
    	}
    	elseif ($data->password) {
    		$validate =  Validator::make($data->all(),[
    		'password' => 'required|min:6|same:cpassword',
    		"cpassword"=>"required|min:6",
    		]);
    	if ($validate->fails()) {
    		 return redirect()->back()->withInput()->withErrors($validate);
    	}else{
    		/*$id = User::insertGetId([
    			'name'=>  $this->dataToserver->fullname, 
		        'email'=> $data->email, 
		        'password'=>bcrypt($data->password), 
		        
		        'mobile'=>  $this->dataToserver->phone,
		        'phone'=>  $this->dataToserver->phone,
		        'address'=> $this->dataToserver->address,
		        'city'=>  $this->dataToserver->city,
		        'country'=>  $this->dataToserver->country,
		        'default_cash_account_id'=> 0,
		        'status_id'=>1,
		        'default_language_id'=>1,
		        'company_id'=>0,
		        'role_type_id'=>1,
		        'date'=>date('Y-m-d H:i:s'),
		        'updated_date'=>date('Y-m-d H:i:s'),
		        'registered_by'=>0,
		        'remember_token'=>$data->_token
		    ]);
		    Staff::insert([
		    		 'name'=>  $this->dataToserver->fullname,
			        'tell'=>  $this->dataToserver->phone,
			        'email'=>  $this->dataToserver->email,
			        'specialization'=>  $this->dataToserver->speciality,
			        'nationality'=>  $this->dataToserver->country,
			        'salary'=> 0,
			        'address'=>  $this->dataToserver->address,
			        'visit_amount'=>  $this->dataToserver->visit_amount,
			        'datebirth'=> null,
			        "user_id"=> $id,
			        'type'=>"Doctor",
			        "status_id"=>1,
			         "company_id"=>0,
		    ]);*/
    		$find = User::find($data->user_id);
    		$find->password = $data->password;//$this->dataToserver->country =
    		$find->city =$data->city;
    		$find->address =$data->address;
    		$staffdata = Staff::find($data->doctor_id);
    		$staffdata->nationality= $data->country;
    		$staffdata->address=$data->address;
    		$staffdata->save();
    		$find->save();
    		 return redirect("/");
    	}
    	}
    }
}
