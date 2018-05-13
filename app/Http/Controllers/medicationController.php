<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Response;
use App\Models\MedicationList;
class medicationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
    	return view('medication.medication');
    }
    public static function getdata($data){
    	 $data  = DB::table(''.$data.'')
          //->where("status_id",1)
          //->where('prescription_list.company_id','=',Auth::user()->company_id)
          ->get();
  		return $data;
    }
    public function savemedication(Request $request){
    	$valid = Validator::make($request->all(),[
    		"name"=>"required|min:3|string",
			"effect"=>"required|min:3|string",
			"strenght"=>"required|min:1|numeric",
			"unit"=>"required|min:1|numeric",
			]);
    	if ($valid->fails()) {
    		return Response::json($valid->messages());
    	}else{
            if ($request->has('id')) {
                $dataupdate = MedicationList::find($request->input('id'));
                $dataupdate->name=$request->input('name');
                $dataupdate->effect=$request->input('effect');
                $dataupdate->strenght=$request->input('strenght');
                $dataupdate->unit_id=$request->input('unit');
                $dataupdate->save();
                $route=[];
                $dosage=[];
            foreach ($request->input('route') as $val) {
                $route []= array(
                    'medication_id' =>$dataupdate->id,
                    'route_id' => $val
                     );
            }

            foreach ($request->input('dosage') as $val) {
                $dosage []= array(
                    'medication_id' =>$dataupdate->id,
                    'dosage_unit_id' => $val
                     );
            }
        DB::table('medication_dosage_units')->where('medication_id',$dataupdate->id)->delete();
        DB::table('medication_route')->where('medication_id',$dataupdate->id)->delete();
        DB::table('medication_dosage_units')->insert($dosage);
        DB::table('medication_route')->insert($route);
            $messages = array('success' =>'success full updated !' );
            return Response::json($messages);

        
                               
            }else{
    		$data= array(
    			'name'=>$request->input('name'),
    			'effect'=>$request->input('effect'),
    			'status_id'=>1,
    			'strenght'=>$request->input('strenght'),
    			'unit_id'=>$request->input('unit'),
    			'company_id'=>Auth::user()->company_id
    			);
    		$id  = DB::table('medication_list')->insertGetId($data);
    		$route=[];
    		$dosage=[];
    		foreach ($request->input('route') as $val) {
    			$route []= array(
    				'medication_id' =>$id,
    				'route_id' => $val
    				 );
    		}

    		foreach ($request->input('dosage') as $val) {
    			$dosage []= array(
    				'medication_id' =>$id,
    				'dosage_unit_id' => $val
    				 );
    		}
    		DB::table('medication_dosage_units')->insert($dosage);
    		DB::table('medication_route')->insert($route);
    		
    		return Response::json(['success'=>'success full saved !']);

    	}
    }


    }
    public function loadmedication(){    	
        $data=DB::table('medication_list')->join("units","units.id","=","medication_list.unit_id")
        ->join("medication_route","medication_route.medication_id","=","medication_list.id")
        ->join("route_list","route_list.rl_id","=","medication_route.route_id")
         ->join("medication_dosage_units","medication_dosage_units.medication_id","=","medication_list.id")
         ->join("dosage_unit_list","dosage_unit_list.dul_id","=","medication_dosage_units.dosage_unit_id")
         ->select("medication_list.id","medication_list.name","medication_list.effect","medication_list.strenght","route_list.name as route_name","dosage_unit_list.dosage_unit_name","units.unit")
         ->where('medication_list.status_id','>',0)
         ->get();

        return \DataTables::of(self::removeduplicate($data,'id'))->make(true);
    }

     public static function finddrug($data){
        if ($data==null) {
           $largedata =  MedicationList::join('medication_dosage_units','medication_dosage_units.medication_id','=','medication_list.id')
           ->join("dosage_unit_list","dosage_unit_list.dul_id","=","medication_dosage_units.dosage_unit_id")
           ->join("units","units.id","=","medication_list.unit_id")
            ->select('medication_list.id','medication_list.name','medication_list.effect','medication_list.status_id','medication_list.strenght','medication_list.id','units.unit')
         //->where('medication_list.id',$data)    
         ->where('medication_list.status_id',">",0) 
          ->distinct('medication_dosage_units.medication_id')   
          ->get();
          
          return self::removeduplicate($largedata,'id');
        }else{
         $getresult  = MedicationList::join('medication_dosage_units','medication_dosage_units.medication_id','=','medication_list.id')
           ->join("dosage_unit_list","dosage_unit_list.dul_id","=","medication_dosage_units.dosage_unit_id")
            ->select('medication_list.id','medication_list.name','medication_list.effect','medication_list.status_id','medication_list.strenght','medication_list.id','dosage_unit_list.dosage_unit_name')
         ->where('medication_list.id',$data)    
         ->where('medication_list.status_id',">",0) 
         ->distinct('dosage_unit_list.dul_id')  
         ->first();        
        return $getresult;
}
    }
    public static function removeduplicate($data,$id){
      $data= $data->unique($id);
      $data = array_slice($data->values()->all(), 0, 5, true);
      return $data;
    }
    public function getfrequencylist(){
      return response()->json(['success'=>DB::table("frequency_list")->get()],200);
    }
public function saveprescriptionprofile(Request $request){
    //if ($request->input("actiontype")=="register") {
    $input = $request->all();
    $rules = [];
    $messages = [];
    foreach($input['medication_id'] as $key => $val){
    $rules['medication_id.'.$key] = 'required|numeric|min:1';
    $rules['frequency_id.'.$key] = 'required|numeric|min:1';
    $rules['dosage.'.$key] = 'required|min:1';
    $rules['days.'.$key] = 'required|min:1|numeric';
    $rules['instruction.'.$key] = 'required|min:1';
   }
    $vd = Validator::make($input,$rules);
    if($vd->fails()){
      return response()->json($vd->messages());
    }else{
      $array_pres_list = array(
      'patient_id' => $request->input("patient_id") ,
      "doctor_id"=>$request->input("doctor_id") ,
      "status_id"=>1,
      'company_id'=>Auth::user()->company_id,
      "date"=>date('Y-m-d H:i:s')
       );
      $another = [];
      $id =   DB::table("prescription_list")->insertGetId($array_pres_list);
      foreach($request->input("medication_id") as $key => $value) {
        $another []=array(
        'prescription_id'=>$id,
        'medication_id' =>$value,
        'dosage'=>$request->input("dosage")[$key],
        //'dosage_unit_id'=>$request->input("dosage_unit_id")[$key],
        'frequency_id'=>$request->input("frequency_id")[$key],
        'duration'=>$request->input("days")[$key],
        'instruction'=>$request->input("instruction")[$key],
        'status_id'=>1,
        );
      }
      DB::table("prescription_detail")->insert($another);
    return Response::json(['success'=>'success full saved !']);
    }
  /*}else{
      $update_data = PrescriptionDetail::find($request->input("pres_id"));
        $update_data->dosage=$request->input("injection")[0];
        $update_data->dosage_unit_id=$request->input("dul_id");
        $update_data->frequency_id=$request->input("frequency_id")[0];
        $update_data->duration=$request->input("days")[0];
        $update_data->instruction=$request->input("bf")[0];
        $update_data->save();
        $succ = array('success' =>'Success full Updated!');
      return response()->json($succ);
      }*/

}
 public static function loadprescription_profile($filter_id){
   $data  = DB::table("prescription_detail")->join('medication_list','medication_list.id','=','prescription_detail.medication_id')
 ->join('prescription_list','prescription_list.id','=','prescription_detail.prescription_id')
          ->join('patients','patients.id','=','prescription_list.patient_id')
          ->join('staff','staff.id','=','prescription_list.doctor_id')
          ->join('frequency_list','frequency_list.id','=','prescription_detail.frequency_id')
          //->join('dosage_unit_list','dosage_unit_list.dul_id','=','prescription_detail.dosage_unit_id')
          ->select('medication_list.name as medical_name','staff.name as doctor_name','patients.patient_name','prescription_list.date','prescription_list.id as master_id','prescription_detail.id as detail_id','prescription_detail.duration','prescription_detail.dosage','prescription_detail.instruction','frequency_list.name as frequency_name','prescription_detail.prescription_id')
          ->where("prescription_list.patient_id",$filter_id)
          ->where("prescription_detail.status_id",1)
          ->where('prescription_list.company_id','=',Auth::user()->company_id)
          ->get();
          return $data;
 }
}
