<?php

namespace App\Http\Controllers;
use App\Http\Controllers\companyController;
use Illuminate\Http\Request;
use Validator;
use App\Models\Roles;
use App\Models\permissionMaping;
use Lang;
use DB;
use Auth;
use App\Http\Controllers\LabController;
class roleController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
    	return view("role.role")->with("licheck",companyController::listside());
    }
    public function saverole(Request $request){
        $valid =  Validator::make($request->all(),[
            "name"=>"required|min:2|string",
            "desc"=>"required|min:2|string"
        ]);
                if ($valid->fails()) {
            return response()->json($valid->messages());
        }else{
            if($request->has("id")){
            permissionMaping::where("entity_id",$request->Input("id"))->delete();
            $id = Roles::find($request->Input("id"));
            $id->name=$request->Input("name");
             $id->description=$request->Input("desc");
            
             if ($request->has("child_id")) {
            $save = [];
        foreach ($request->Input("child_id") as $key => $value) {
            $save[] = [
                'entity_id'=> $id->id,
                'entity_type_id'=> $id->id,
                'permission_id'=>$value,
                'status_id'=>1
            ];
        }
        permissionMaping::insert($save);
    }
     $id->save();
        $success = array('success' =>'success full updated!');
        return response()->json($success);
            }else{
    	$id = Roles::insertGetId([
    		"name"=>$request->Input("name"),
            'description'=>$request->Input("desc"),
    		"status_id"=>1
    	]);
    	if ($request->has("child_id")) {
    		$save = [];
    	foreach ($request->Input("child_id") as $key => $value) {
    		$save[] = [
    			'entity_id'=> $id,
        		'entity_type_id'=>$id,
        		'permission_id'=>$value,
        		'status_id'=>1
    		];
    	}
        permissionMaping::insert($save);
    }
    return labController::getMessages('success','success.success');
        }
            	
        }


    }

public function getRoleView()
    {
    $data = Roles::join('permission_maping','permission_maping.entity_id','=','roles.id')
            ->select(DB::raw("count(permission_maping.entity_id) as count"),'roles.name as name','roles.id as id','roles.description as description')
            ->where('roles.status_id','>',0)
            ->groupBy('roles.id')
            ->get();
    return response()->json($data,200);
    }
}
