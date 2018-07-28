<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use DB;
use Response;
use App\User;
use App\Models\Staff;
use App\Models\Tests;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use App\Models\Appointment;
use App\Models\Patient;
use App\Http\Controllers\medicationController;
use Illuminate\Http\Request;

class authController extends Controller
{
   public static function AuthPatient()
   {
   return User::join("patients","patients.user_id","=","users.id")
   					->select("patients.*")
   					->where("patients.user_id",Auth::user()->id)
   					->first();
   }
   public static function AuthDoctor()
   {
   $data  = User::join("staff","staff.user_id","=","users.id")
   					->select("staff.*")
   					->where("staff.user_id",Auth::user()->id)
   					->first();
                  if ($data) {
                  if ($data->type=="Doctor") {
                   return $data;
                  }
               }
   }
   public static function isDocument(){
      $data = self::AuthDoctor();
      if ($data) {
         # code...
          if ($data->title  && $data->experience && $data->gender  && $data->datebirth && $data->status_id !=6) {
                    return true;
                  }else{
                     return false;
     }
    }
    }
   
   public static function getPercentage(){
      $results = DB::select( DB::raw(" SELECT count(1) as TotalAll, count(staff.visit_amount) as TotalNotNull, count(1) - count(staff.visit_amount) as TotalNull, 100.0 * count(staff.visit_amount) / count(1) as PercentNotNull FROM staff join users on users.id = staff.user_id where users.id= :Auth::user()->id"), array('id' => Auth::user()->id));
      return $results;
   }
}
