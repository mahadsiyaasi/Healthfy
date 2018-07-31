<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Response;
use App\Models\Staff;
use App\Models\Tests;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use Calendar;
use App\Models\Appointment;

class addController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function add($id){
   /* $eloquentEvent = Appointment::first(); 
     $events = [];
        $data = Appointment::where("patient_id",$id)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->disease,
                    true,
                    new \DateTime($value->start_date." ".$value->start_time),
                    new \DateTime($value->end_date." ".$value->end_time),
                    'stringEventId',
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                         'viewRender' => 'function() {alert("Callbacks!");}'
                    ]
                );
            }

        }
        $calendar = \Calendar::addEvents($events);

     
         */
         return View('patients.add')
             ->with('patient',DB::table("patients")->where("id",$id)->first())
             ->with("doctors",Staff::where("type","Doctor")->get());
            
    }
    public function saveorder(Request $request){
    $input = $request->all();
$rules = [];
$messages = [];
$datasave = [];
foreach($input['id'] as $key => $val)
{
    $rules['id.'.$key] = 'required|numeric|min:1';
    $rules['amount.'.$key] = 'required|numeric|min:1';
     $messages['id.'.$key] = 'Error while data saving ';
}
$valid = Validator::make($input,$rules,$messages);
if ($valid->fails()) {
return Response::json($valid->messages());

}else{
    $id  = OrderMaster::insertGetId([
        'status_id'=>2,
        'date'=>date('Y-m-d H:i:s'),  
        'company_id'=>Auth::user()->company_id,
        'user_id'=>Auth::user()->id,
        'doctor_id'=>$request->input("doctor_id"),
        'patient_id'=>$request->input("patient_id"),
        'total_amount'=>$request->input("total")
    ]);
    foreach ($request->input("id") as $key => $value) {
        $datasave[]= [
            'status_id'=>2,
            'test_id'=>$value,  
            'test_order_id'=>$id,
            'amount'=>$request->input("amount")[$key],
            ];
    }
    OrderDetail::insert($datasave);
    return Response::json(["success"=>"Success full saved"]);
}
}
 public function loadappoint(){
    return Response::json(Staff::where('type','Doctor')->get());
 }
 public function loadevent(Request $request){
    $json = Appointment::join('staff','staff.id','=','appointment.doctor_id')
    ->join('patients','patients.id','=','appointment.patient_id')
    ->select('appointment.start_date','appointment.start_time','appointment.end_date','appointment.end_time','appointment.id','staff.name','patients.patient_name','appointment.date','appointment.note','appointment.amount')
    ->where("patient_id",$request->input("id"))
    ->where("appointment.status_id",'>',0)
    ->where("appointment.company_id",'=',Auth::user()->company_id)
    ->get();
    $arrayName = [];
    foreach ($json as $key => $json) {
      $arrayName [] = array(
        "allDay"=> "",
        "desc"=> $json->note,
        "title"=>'DR . '.$json->name,
        "patient"=>$json->patient_name,
        "date"=>$json->date,
        "id"=>$json->id,
        "end"=> $json->end_date.' '.$json->end_time,
        "start"=> $json->start_date.' '.$json->start_time,
        "end_time"=>$json->end_time,
        "start_time"=>$json->start_time,
        "amount"=> $json->amount,

         );
    }
    
    return Response::json($arrayName);
 }

 public function newappoint(Request $request){

    $validator = Validator::make($request->all(),
            [
                'disease' => 'required|string|min:1',
                'start_date' => 'required|min:2|date',
                'end_date' => 'required|min:2|date',
                'start_time' => 'required|min:2',
                'end_time' => 'required|min:2',
                'amount' => 'required|min:1|numeric',
                'description' => 'required|min:4|string',
                'patient_id' => 'required|min:1|numeric',
                'doctor_id' => 'required|min:1|numeric',
            ]
        );



     $dataC = [
        'patient_id'=>$request->input('patient_id'),
        'doctor_id'=>$request->input('doctor_id'), 
        'start_date'=>$request->input('start_date'),
        'end_date'=>$request->input('end_date'),
        'start_time'=>$request->input('start_time'),
        'status_id'=>1,
        'company_id'=>Auth::user()->company_id,
        'date'=>date('Y-m-d H:i:s'),
        'amount'=>$request->input('amount'),
        'disease'=>$request->input('disease'),
        "end_time"=>$request->input('start_time'),
        "note"=>$request->input('description'),     
       
    ];

        if($validator->fails()){
           return Response::json($validator->messages());
        }
        else{
          if (!$request->has("id")) {
            Appointment::insert($dataC);
        $succefull =  array('success' =>'the appointment created succefull !');
        return Response::json($succefull);
          }else{
            $data =Appointment::find($request->input("id"));
             $data->start_date  =$request->input('start_date');
              $data->end_date    =   $request->input('end_date');
              $data->start_time     =   $request->input('start_time');
              $data->end_time   =   $request->input('end_time');
              $data->disease   =  $request->input('disease');
              $data->doctor_id   =  $request->input('doctor_id');
              $data->note   =  $request->input('description');
              $data->amount    =   $request->input('amount');
              $data->save();
          $succefull =  array('success' =>'the appointment Updated succefull !');
          return Response::json($succefull);
          }

       
        }
    
 }
}
