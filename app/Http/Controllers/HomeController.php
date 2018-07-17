<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Patient;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $patient = Patient::where("user_id",Auth::user()->id)->first();
         return redirect('/patients/'.$patient->id);
      }elseif (Gate::allows('Admin', auth()->user())) {
         return view('index');
      }elseif (Gate::allows('Doctor', auth()->user())) {
     $doctor = Staff::where("user_id",Auth::user()->id)->first();
         return redirect('/doctors/'.$doctor->id);
      }else{
         return view('index');
        
      }
        
    
       
    }
}
