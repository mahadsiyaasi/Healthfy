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
       $datas=DB::table("permissions")->get();
         return Auth::user()->getPermissionsViaRoles();
       }
}
