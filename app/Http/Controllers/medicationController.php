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
    		$messages = array('success' =>'success full saved !' );
    		return Response::json($messages);

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

        return \DataTables::of($data)->make(true);
    }

     public static function finddrug($data){
        if ($data==null) {
           return MedicationList::all();
        }else{
         $data  = MedicationList::find($data);         
        
        return $data;
}
    }

}
