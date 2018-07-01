<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Staff;

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
    $data  = DB::table("staff")->where("status_id",1) 
    ->where("company_id",Auth::user()->company_id)
    ->where("type",$request->input("filter")?$request->input("filter"):"Doctor")
    ->get();
    return response::json($data,200);
    }
     public static function getdoctor($id){
      $data  = Staff::where("id",$id)
      ->where("status_id",1)
      ->first();
      return $data;
    }
}
