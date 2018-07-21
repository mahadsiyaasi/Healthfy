<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Permissions;
Use App\Models\Roles;
class companyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function company()
    {
      $datfield = Permissions::all();
       $datfield2 = Role::all();
     
       foreach ($datfield2 as $key => $value) {
      $permission = Role::create(['name' => $value->name]);
      }
      
       $datas=User::join("chealths","chealths.id","=","users.company_id")
        ->select("chealths.*")
         ->where("users.id","=",Auth::user()->id)
        ->where("users.company_id",Auth::user()->company_id)
        ->first();        
         if (empty($datas)) {
          return Auth::user();
         }else{
           return $datas;
         }
       }
       public static function listside()
    {
      $ids =  DB::table("users")->join("role","role.id","=","users.role_type_id")
       ->join("permission_maping","permission_maping.entity_id","=","role.id")
       ->join("permissions","permissions.id","=","permission_maping.permission_id")
       ->select("parent_id")
       //->distinct('permissions.parent_id')
       ->where("role.id",Auth::user()->role_type_id)
       ->distinct('permissions.parent_id')
       ->orderBy("permissions.id")->get();
       $parent_names = [];
       foreach ($ids as $key => $value) {
        $parent_names [] = Permissions::find($value->parent_id);
       }
      // return $parent_names;
      $listside = DB::table("users")->join("role","role.id","=","users.role_type_id")
       ->join("permission_maping","permission_maping.entity_id","=","role.id")
       ->join("permissions","permissions.id","=","permission_maping.permission_id")
       ->select("permissions.*")
       ->where("role.id",Auth::user()->role_type_id)
       ->distinct('permissions.id')
       ->orderBy("permissions.id","ASC")
       ->get();
       $data = new \stdClass;
       $data->parents = $parent_names;
       $data->child = $listside;
       return $data;

     }
}
