<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Tests;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use App\Models\Unit;
use App\Models\Reference;
class testsController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
    	return view("tests.tests");
    }
    public function savegroup(Request $request){
    	if (!$request->has("id")) {
    		Tests::create([
    			"name"=>$request->input("gn"),
    			"type"=>"Group",
    			"status_id"=>1
    		]);
    		return Response::json(["success"=>"Success full saved"]);
    	}else{
    		$data = Tests::find($request->input("id"));
    		$data->name = $request->input("gn");
    		$data->save();
    		return Response::json(["success"=>"Success full updated"]);
    	}
    }
    public function loadtest(Request $request){
    	$group = Tests::where("type","Group")->where("status_id",1)->get();
    	$item  = Tests::where("type","Item")->where("status_id",1)->get();
    	if ($request->has("filter")) {
        return datatables()->of($item)->toJson();
    	}elseif($request->has("group")) {

           return datatables()->of($group)->toJson();
        }elseif($request->has("id")) {
           return Response::json([
            "item"=>$item
        ]);

        }
        else{
    	return Response::json([
    		"group"=>$group
    	]);
    }
    }
     public function savetestorder(Request $request){
     	$Validator = Validator::make($request->all(),[
     		"name"=>'required|min:3|string',
     		"report"=>'required|min:1|string',
     		"lowcheck"=>'required|min:1|string',
     		"group"=>'required|min:1|numeric',
     		"advice"=>'required|min:3|string',
     		"amount"=>'required|min:1|numeric',
     		"desc"=>'required|min:10|string',

     	]);
    	if ($Validator->fails()) {
    		return Response::json($Validator->messages());
    	}else{
    		if ($request->has("id")) {
    			$data = Tests::find($request->input("id"));
    			$data->name=$request->input("name");
    			$data->amount=$request->input("amount");
        		$data->report=$request->input("report");
		        $data->advice=$request->input("advice");
		        $data->low=$request->input("lowcheck");
		        $data->parent_id=$request->input("group");
		        $data->description=$request->input("desc");
		        $data->save();
		        return Response::json(["success"=>"Success full updated"]);
    		}else{
    		Tests::create([
    			"name"=>$request->input("name"),
    			"type"=>"Item",
    			"status_id"=>1,
    			'amount'=>$request->input("amount"),
        		'report'=>$request->input("report"),
		        'advice'=>$request->input("advice"),
		        'low'=>$request->input("lowcheck"),
		        'parent_id'=>$request->input("group"),
		        'description'=>$request->input("desc")
    		]);
    		return Response::json(["success"=>"Success full saved"]);
    	}
     }

}
 public function saverange(Request $request){
    $valid;
    if (!empty($request->input("min")) ){
        $valid =  Validator::make($request->all(),[
            'min'=>'required|min:1|numeric',
            'max'=>'required|min:1|numeric',
            'group_id'=>'required|min:1',
        ]);
    }
    if(!empty($request->input("unit"))) {
       $valid =  Validator::make($request->all(),[
           'unit'=>'required|min:1',
        ]);
    }



    if ($valid->fails()) {
       return Response::json($valid->messages());
    }else{
     if (!empty($request->input("min") )) {
        Reference::create([
            'min'=>$request->input("min"),
            'max'=>$request->input("max"),
            'group_id'=>$request->input("group_id"),
            ]);
    }
     if (!empty($request->input("unit"))) {
       Unit::create([
            'unit'=>$request->input("unit"),
            'group_id'=>$request->input("group_id"),
            ]);
    }
    return Response::json(['success'=>"Success full saved !"]);
    }
 }
  public function loadrange(){
    $range = Reference::join('tests','tests.id','=','reference.group_id')
    ->select("reference.min","reference.max",'tests.name')
    ->get();
    $unit = Unit::join('tests','tests.id','=','units.group_id')
    ->select("units.unit",'tests.name')
    ->get();
    return Response::json([
        'range'=>$range,
        'unit'=>$unit
    ]);
  }

}
