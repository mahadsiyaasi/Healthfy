<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Patient;
use App\Models\Staff;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\medicationController;
use App\Http\Controllers\authController;
class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
  {
      if (Gate::allows('patient', auth()->user())) {
         return view('patients.singlepatient')->with('patient',authController::authPatient())->with("patientPrescriptions",medicationController::removeduplicate(medicationController::loadprescription_profile(authController::authPatient()->id),'detail_id'));  
      }elseif (Gate::allows('Admin', auth()->user())) {
         return view('index');
      }elseif (Gate::allows('Doctor', auth()->user())) {       
          return view('doctors.home.home')->with('doctor',authController::authDoctor());  
      }else{
         return view('index');
        
      }   
    
       
    }
}
