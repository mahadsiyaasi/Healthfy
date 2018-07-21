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
}
