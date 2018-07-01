<?php

namespace App\Http\Controllers;
use App\Http\Controllers\companyController;
use Illuminate\Http\Request;
use Validator;
use App\Models\Roles;
use App\Models\permissionMaping;
use App\Models\Permission;
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
            if($request->has("_id")){
            permissionMaping::where("entity_id",$request->_id)->delete();
            $id = Roles::find($request->_id);
            $id->name=$request->name;
             $id->description=$request->desc;            
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
        return labController::getMessages('success','success.update');
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
    public static function getupdateRole($finddata)
    {
        ///DB::raw("count(permission_maping.entity_id) as count"),
       $data = new \stdclass;
       $data->role =Roles::find($finddata);
       $data->permission = Roles::join('permission_maping','permission_maping.entity_id','=','roles.id')
            ->select('permission_maping.*')
            ->where('roles.status_id','>',0)
            ->where('roles.id','=',$finddata)
            ->get();  
            return $data;
    }
     public static function getRolecheck($finddata,$role_id)
    {
        ///DB::raw("count(permission_maping.entity_id) as count"),
       $data=permissionMaping::where('permission_id',$finddata)
        ->where("entity_id",$role_id)
       ->get();
       if (!empty($data[0])) {
           return 'true';
       }else{
        return 'false';
       }
        
    }
}
