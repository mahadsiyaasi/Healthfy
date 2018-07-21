<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Response;
use App\Models\Patient;
class customerController extends Controller
{
    public function __construct()
    {
         $this->middleware(['auth']);
    }

public function patient(Request $request){
  return View("patients.patient");
}
 public function savepatient(Request $request){

	$validator = Validator::make($request->all(),
            [
                'patientname' => 'required|string|min:5',
                'phone' => 'required|min:9|numeric',
                'Address' => 'required|min:5',
                'Gender' => 'required|min:4',
                'countrys' => 'required|min:5',
                'dateofbirth' => 'required|min:4|date',
                'district'=> 'required|min:4',
                //'phone'=>'required|numeric|min:9',
                'state'=>'required|min:4',
            ]
        );



	 $dataC = [
        'patient_name'  =>ucwords($request->input('patientname')),
        'country'     =>   $request->input('countrys'),
        'state'     =>   $request->input('state'),
        'district'     =>   $request->input('district'),
        'address'     =>   $request->input('Address'),
        'patient_tell'     =>   $request->input('phone'),
        'datebirth'     =>   $request->input('dateofbirth'),
        'gender'     =>   $request->input('Gender'),
        'date'=>date('Y-m-d H:i:s'),
        "user_id"=>Auth::user()->id,
        "status_id"=>1,
        "company_id"=>Auth::user()->company_id
    ];

		if($validator->fails()){
           return Response::json($validator->messages());
        }
        else{
          if (!$request->has("hidden_id")) {
            DB::table("patients")->insert($dataC);
        $succefull =  array('success' =>'the patient created succefull !');
        return Response::json($succefull);
          }else{
            $data =Patient::find($request->input("hidden_id"));
             $data->patient_name  =ucwords($request->input('patientname'));
              $data->country    =   $request->input('countrys');
              $data->state     =   $request->input('state');
              $data->district   =   $request->input('district');
              $data->address   =  $request->input('Address');
              $data->patient_tell   =  $request->input('phone');
              $data->datebirth    =   $request->input('dateofbirth');
              $data->gender   =  $request->input('Gender');
             $data->save();
          $succefull =  array('success' =>'the patient Updated succefull !');
          return Response::json($succefull);
          }

       
        }
    
 }
 public function sendgriddata(){
 	return datatables()->of(DB::table("patients")->where("status_id",1)->get())->toJson();

 }
  public static function getcustomer($id){
      $data  = Patient::where("id",$id)
      ->where("status_id",1)
      ->first();
      return $data;
    }
   
}
