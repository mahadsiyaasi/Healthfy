<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Response;
use App\Models\Staff;
use App\Models\Tests;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use App\Models\Appointment;
use App\Models\Patient;
use App\Http\Controllers\medicationController;
use App\Http\Controllers\authController;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class patientGroupController extends medicationController
{
	public function appointview()
	{
	return view("appointments.appointview")->with("patient",authController::Authpatient());
	}
	public function prescripeview()
	{

	return view("prescriptions.prescriptionview")->with("patient",authController::Authpatient())->with("patientPrescriptions",medicationController::removeduplicate(medicationController::loadprescription_profile(authController::Authpatient()->id),'detail_id'));
	}
    
}
