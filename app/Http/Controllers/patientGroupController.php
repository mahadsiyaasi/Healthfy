<?php

namespace Healthfy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Response;
use Healthfy\Models\Staff;
use Healthfy\Models\Tests;
use Healthfy\Models\OrderMaster;
use Healthfy\Models\OrderDetail;
use Healthfy\Models\Appointment;
use Healthfy\Models\Patient;
use Healthfy\Http\Controllers\medicationController;
use Healthfy\Http\Controllers\authController;
namespace Healthfy\Http\Controllers;

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
