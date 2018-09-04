<?php

namespace Healthfy\Http\Controllers;
use Auth;
use Validator;
use DB;
use Response;
use Healthfy\User;
use Healthfy\Models\Staff;
use Healthfy\Models\Tests;
use Healthfy\Models\OrderMaster;
use Healthfy\Models\OrderDetail;
use Healthfy\Models\Appointment;
use Healthfy\Models\Patient;
use Healthfy\Http\Controllers\medicationController;
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
   
   public static function getPercentage($type){
     
      if ($type=="staff") {
          $Auth = self::AuthDoctor();
         $maximumPoints = 100;
         $point = 0;
         {
         if($Auth->visit_amount != '')
         $point+=10;

         if($Auth->city != '')
         $point+=10;

         if($Auth->address != '')
         $point+=10;

         if($Auth->datebirth != '')
         $point+=10;

         if($Auth->degree != '')
         $point+=10;

        if($Auth->experience != '')
         $point+=10;

       if($Auth->about != '')
         $point+=10;

       if($Auth->title != '')
         $point+=10;

       if(Auth::user()->getFirstMediaUrl('image', 'thumb') != '')
         $point+=10;

         if($Auth->email != '')
         $point+=10;
 }
 $percentage = ($point*$maximumPoints)/100;
 return $percentage;

          
      }elseif ($type=="qualification") {
       $results = DB::table('qualification')->where('doctor_id',self::AuthDoctor()->id)->where('status_id',">",0)->count();
       if ($results <1){ $results  = 0;}
       elseif ($results ==1){ $results  = 33;}
       elseif ($results ==2){ $results  = 66;}
       elseif ($results ==3){ $results  = 99;}
       elseif ($results >3){ $results  = 100;}

        return $results;

      }
     
   }
}
