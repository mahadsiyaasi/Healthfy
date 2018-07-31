<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Staff;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\User;
use App\Models\Appointment;
class doctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function doctor(){
   	return view("doctors.doctor");
   }
   public static function loadspeciality(){
   	$variable =  DB::table("varaible_lists")->where("group_key","Specialities")->get();
   	return $variable;
   }
   public static function loaddegrees(){
    $variable =  DB::table("degrees")->get();
    return $variable;
   }

    public function savedoctor(Request $request){
    	$validator = Validator::make($request->all(),
            [
                'doctorname' => 'required|min:5',
                'doctortell' => 'required|numeric|min:9',
                'address' => 'required|min:5',
                'birthdate' => 'required|date|min:5',
                'specialist' => 'required|min:3',
                'nationality' => 'required|min:3',
                'vamount'=>'required|min:1|numeric',
                'salary'=> 'required|min:1|numeric'
                ]
        );



	 

		if($validator->fails()){
           return Response::json($validator->messages(),200);
        }
        else{
            if ($request->has("hiddenid")) {

            $data =  Staff::find($request->input("hiddenid"));
            $data->name=ucwords($request->input('doctorname'));
            $data->tell =   $request->input('doctortell');
            $data->email= $request->input('email')?$request->input('email'):$data->email;
            $data->specialization=$request->input('specialist');
            $data->nationality=  $request->input('nationality');
            $data->salary=$request->input('salary');
            $data->address=$request->input('address');
            $data->visit_amount=$request->input('vamount');
            $data->datebirth=$request->input('birthdate');
            //$data->user_id=$request->input('email')?$this->saveuser($request->all()):$data->user_id;
            //$data->status_id=1;
            $data->save();
            $succefull =array('success'=>'Updated succefull !');
            //$this->saveuser($request->all());
            return Response::json($succefull);
        
        
        }
         else{
            $dataC = [
        'name'  =>ucwords($request->input('doctorname')),
        'tell'     =>   $request->input('doctortell'),
        'email'     =>   $request->input('email'),
        'specialization'     =>   $request->input('specialist'),
        'nationality'     =>   $request->input('nationality'),
        'salary'     =>   $request->input('salary'),
        'address'     =>   $request->input('address'),
        'visit_amount'     =>$request->input('vamount'),
        'datebirth'     =>   $request->input('birthdate'),
        "user_id"=>$request->input('email')?$this->saveuser($request->all()):null,
        'type'=>"Doctor",
        "status_id"=>1,
         "company_id"=>Auth::user()->company_id
         ];
        DB::table("staff")->insert($dataC);    
        $succefull =array('success'=>'created succefull !');
        return Response::json($succefull,200);
    }
    }
}
  public function loaddoctors(Request $request){
          if ($request->unapproved) {
           $data  = DB::table("staff")->where("status_id",6) 
          ->get();
         return \DataTables::of($data)->make(true);
          }elseif($request->_id){
            $staff =Staff::find($request->_id);
            $staff->status_id = 1;
            $staff->save();
            return response()->json(['success'=>true]);



          }
          elseif($request->decline_id){
            $staff =Staff::find($request->decline_id);
            $staff->status_id = 6;
            $staff->save();
            return response()->json(['success'=>true]);



          }


          else{


          $data  = DB::table("staff")->where("status_id",1) 
         ->where("type",$request->input("filter")?$request->input("filter"):"Doctor")
          ->get();
         return \DataTables::of($data)->make(true);
        }
    }
     public static function getdoctor(){
      $data  = Staff::where("id",\App\Http\Controllers\authController::authDoctor()->id)
      ->where("status_id",">",0)
      ->first();
      return $data;
    }
    public static function getdDC($id){
      $data  = Staff::where("id",$id)
      ->where("status_id",1)
      ->first();
      return $data;
    }
    public function complete(){
      return view("complete.complete");
    }
    public function updateDoctorcomplete(Request $data){
         $validator = Validator::make($data->all(),
            [
                'title' => 'required|min:1',
                'doctortell' => 'required|numeric|min:9',
                'address' => 'required|min:2',  
                //'image' => 'required|file|image|mimes:jpeg,bmp,png',              
                'birthdate' => 'required|date|min:2',
                'gender' => 'required|min:2',                
                'about' => 'required|min:5',
                'visit_amount'=>'required|min:1',
                'city'=>'required|min:3',                
                'experience'=> 'required|min:1|numeric'
           ]);
                if ($validator->fails()) {
                  return response()->json($validator->messages(),200);
                }else{
                  return response()->json(["success"=>true],200);
                }       
         }
   public function savelastupdate(Request $data){
      $validator = Validator::make($data->all(),[
              'image' => 'required|file|image|mimes:jpeg,bmp,png',              
              ]);
                if ($validator->fails()) {
                  return redirect()->back()->withInput()->withErrors($validator);
                }else{
              $user = User::find(Auth::user()->id);
              $user->city =$data->city;
              $user->address = $data->address;
              $staff = Staff::find($data->doctor_id);
              $staff->city = $data->city;
              $staff->datebirth = $data->birthdate;
              $staff->experience = $data->experience;
              $staff->tell = $data->doctortell;
              $staff->gender = $data->gender;
              $staff->visit_amount = $data->visit_amount;
              $staff->address = $data->address;
              $staff->title = $data->title;
              $staff->about = $data->about;
              $user->addMediaFromRequest('image')->toMediaCollection('image');
              $staff->save();
               $user->save();

              return redirect()->back()->withInput();
   }
}
public function education(Request $data){
  return $data;
 $validator = Validator::make($data->all(),[
               'qualification' => 'required|min:2',
                'year' => 'required|min:2',                
                'college' => 'required|min:2',             
              ]);
                if ($validator->fails()) {
                  return redirect()->back()->withInput()->withErrors($validator);
                }else{
                 $id =  App\Models\Qualification::create([
                     'doctor_id'=>authController::authDoctor()->id,
                      'qualification_id'=>$data->qualification,
                      'college_id'=>$data->college,
                      'year'=>$data->year,
                      'date'=>date('Y-m-d H:i:s'),
                      'status_id'=>1,
                  ]);

                   return redirect()->back()->withInput();


                }
}
  public function approved(Request $data){
    return view("doctors.approved");
  }

public function appoints(){
   return view("doctors.home.appoints");
}
    public function appointview(){
     $json = Appointment::join('staff','staff.id','=','appointment.doctor_id')
    ->join('patients','patients.id','=','appointment.patient_id')
    ->join('varaible_lists','varaible_lists.status_id','=','appointment.status_id')
    ->select('appointment.start_date','appointment.start_time','appointment.end_date','appointment.end_time','appointment.id','staff.name','patients.patient_name','appointment.date','appointment.note','appointment.amount','varaible_lists.status_name','appointment.disease',"appointment.status_id")
    ->where("doctor_id",authController::authDoctor()->id)
    ->where("appointment.status_id",'>',0)
    //->where("appointment.company_id",'=',Auth::user()->company_id)
    ->get();
    return  datatables()->of($json)->toJson();
    }
    public function appointmentStatusChange(Request $data){
      if ($data->status_id ==1) {
            $update = Appointment::find($data->_id);
            $update->status_id = 2;
            $update->save();
            return response()->json(['success'=>true]);
      }
    }
}
