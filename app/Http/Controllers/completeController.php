<?php

namespace Healthfy\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Models\Clinic;
use Auth;
use Validator;
use App\Http\Controllers\authController;
class completeController extends Controller
{
    public function clinicsaving(Request $data){
    	$validator = Validator::make($data->all(),[
    		// '1_end_time'=>"required|min:1",
			// '1_start_time'=>"required|min:1",
			// '2_end_time'=>"required|min:1",
			// '2_start_time'=>"required|min:1",
			'clinicName'=>"required|min:3",
			"clinicfee"=>"required|min:1",
			//'days'=>"required|min:1",
			'duration'=>"required|min:1",
    	]);
    	if ($validator->fails()) {
    		return response()->json($validator->messages());
		}
		else{
    		Clinic::insert([
    			'name'=>$data->clinicName,
		        'doctor_id'=>authController::authDoctor()->id,
		        'city'=>authController::authDoctor()->city,
		        'date'=>date('Y-m-d H:i:s')
    		]);
    	}
    	return Response::json(['success'=>true]);
    }
}
