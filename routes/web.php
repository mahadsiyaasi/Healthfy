<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







	Route::group(['middleware' => 'can:patients'], function () {	
	Route::any('/appointments', 'patientGroupController@appointview');
	Route::any('/getusers', 'apiController@users');
	Route::post('/apilogin', 'apiController@login');
	Route::any('/patients', 'customerController@patient')->name('Patients | '.config('app.name'));
	Route::any('/patients/{id}',array('uses'=>'pprofileController@getpatient' ))->name('Patient Profile | '.config('app.name'));
	Route::any('/patients/{id}/add',array('uses'=>'addController@add' ))->name('paitent > Add | '.config('app.name'));
	Route::any('/patients/{id}/loadtest','testsController@loadtest');
	Route::any('/patients/{id}/saveorder','addController@saveorder');
	Route::any('/patients/{id}/loadappoint','addController@loadappoint');
	Route::any('/patients/{id}/loadevent','addController@loadevent');
	Route::any('/patients/{id}/newappoint','addController@newappoint');
	Route::any('/patients/{id}/getfrequencylist','medicationController@getfrequencylist');
	Route::any('/patients/{id}/saveprescription','medicationController@saveprescriptionprofile');	
});

	Route::any('/', 'HomeController@index')->name(config('app.name'). ' | '.__('titles.Home'));
	Route::get('/create/patient', 'apiController@getpatientHome')->name(config('app.name'). ' | '.__('titles.Patient_register'));
	Route::get('/create/doctor', 'apiController@getDoctorsHome')->name(config('app.name'). ' | '.__('titles.Patient_register'));
	Route::get('/create/company', 'apiController@gethome')->name(config('app.name'). ' | '.__('titles.Patient_register'));
	Route::any('/saveoutpatient', 'apiController@registerOutPatient');
	Route::any('/saveOutDoctor', 'apiController@saveOutDoctor');
	Route::any('/checkvalidationpatientRegister', 'apiController@checkvalidationpatientRegister');
	Auth::routes();




	Route::group(['middleware' => 'auth'], function () {
	Route::any('/appointments', 'patientGroupController@appointview')->name(__('titles.appoint').' | '.config('app.name'));
	Route::any('/prescriptions', 'patientGroupController@prescripeview')->name(__('titles.prescripe').' | '.config('app.name'));
	Route::any('/patients', 'customerController@patient')->name('Patients | '.config('app.name'));
	Route::any('/patients/{id}',array('uses'=>'pprofileController@getpatient' ))->name('Patient Profile | '.config('app.name'));
	Route::any('/patients/{id}/add',array('uses'=>'addController@add' ))->name('paitent > Add | '.config('app.name'));
	Route::any('/patients/{id}/loadtest','testsController@loadtest');
	Route::any('/patients/{id}/saveorder','addController@saveorder');
	Route::any('/patients/{id}/loadappoint','addController@loadappoint');
	Route::any('/patients/{id}/loadevent','addController@loadevent');
	Route::any('/patients/{id}/newappoint','addController@newappoint');
	Route::any('/patients/{id}/getfrequencylist','medicationController@getfrequencylist');
	Route::any('/patients/{id}/saveprescription','medicationController@saveprescriptionprofile');


	Route::any('/patients/{id}',array('uses'=>'pprofileController@getpatient' ))->name('Patient Profile | '.config('app.name'));
	Route::any('/{id}/add',array('uses'=>'addController@add' ))->name('paitent > Add | '.config('app.name'));
	Route::any('/{id}/loadtest','testsController@loadtest');
	Route::any('/{id}/saveorder','addController@saveorder');
	Route::any('/{id}/loadappoint','addController@loadappoint');
	Route::any('/{id}/loadevent','addController@loadevent');
	Route::any('/{id}/newappoint','addController@newappoint');
	Route::any('/{id}/getfrequencylist','medicationController@getfrequencylist');
	Route::any('/{id}/saveprescription','medicationController@saveprescriptionprofile');

	Route::any('/complete','doctorsController@complete')->name(__('titles.complete').' | '.config('app.name'));
	Route::any('/updateDoctorcomplete','doctorsController@updateDoctorcomplete');
	Route::any('/savelastupdate','doctorsController@savelastupdate');
	Route::any('/educationDoctor','doctorsController@education');
	Route::any('/doctors/unapproved','doctorsController@approved')->name(__('titles.approved').' | '.config('app.name'));

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

	Route::any('/savepatient', 'customerController@savepatient');
	Route::any('/sendgriddata', 'customerController@sendgriddata');
	Route::any('/doctors', 'doctorsController@doctor')->name('Doctors | '.config('app.name'));
	Route::any('/savedoctor','doctorsController@savedoctor');
	Route::any('/loaddoctors','doctorsController@loaddoctors');
	Route::any('/doctors/loaddoctors','doctorsController@loaddoctors');
	Route::any('/editor','editorController@editor')->name('Editor | '.config('app.name'));
	Route::any('/cancels','editorController@cancels');
	Route::any('/tests','testsController@home')->name('Tests | '.config('app.name'));
	Route::any('/savegroup','testsController@savegroup');
	Route::any('/loadtest','testsController@loadtest');
	Route::any('/savetestorder','testsController@savetestorder');	
	Route::any('/loadptest','pprofileController@loadptest');
	Route::any('/saverange','testsController@saverange');
	Route::any('/loadrange','testsController@loadrange');	
	Route::any('/mainappoint','pprofileController@mainappoint');
	Route::any('/loadappoint','addController@loadappoint');

	Route::any('/medication','medicationController@home')->name('Medicaion | '.config('app.name'));;
	Route::any('/savemedication','medicationController@savemedication');
	Route::any('/loadmedication','medicationController@loadmedication');


	Route::any('/lab', 'labController@lab')->name(__('titles.Lab').' | '.config('app.name'));
	Route::any('/filter', 'labController@filter')->name('lab');
	Route::any('/labpayment','labController@labpayment');
	Route::any('/labpayment','labController@labpayment');
	Route::any('/spicement','labController@spicement');
	Route::any('/lab/editor','labController@findhome')->name(__('titles.LabEditor').' | '.config('app.name'));
	Route::any('/lab/saveresult','labController@saveresult');

	Route::any('/payment', 'paymentController@home')->name('Payment Method | '.config('app.name'));
	Route::any('/savepayment','paymentController@savepayment');	
	Route::any('/print','printController@print')->name(__('titles.print').' | '.config('app.name'));
	Route::any('/role','roleController@home')->name(__('titles.role').' | '.config('app.name'));
	Route::any('/saverole','roleController@saverole');
	Route::any('/getroleview','roleController@getRoleView');
	Route::any('/saveUserdata','usersController@saveUsersEmailandpass');
	Route::any('/checkoutFBkit','usersController@accountkit');
	//saveUsersEmailandpass























		/*Route::any('/',array('as' =>'index' ,'uses'=>'patientController@create' ));
		Route::any('/pregister','patientController@showregister');
		Route::any('/save','patientController@save');
		Route::any('/sendGridData','patientController@sendGridData');
		Route::any('/patient_{id}',array('as' =>'patientprofile' ,'uses'=>'patientController@getpatient' ));
		Route::any('/savedoctor','doctorsController@savedoctor');
		Route::any("/savebasictest", 'basicfunctionController@savebasictest');
		Route::any(" /loadtest","basicfunctionController@loadtest");
		Route::any('/doctor_{id}',array('as' =>'doctorprofile' ,'uses'=>'doctorsController@getdoctor' ));
		Route::any(' /doctordata','allpatientController@doctordata');
		Route::any(' /saveappoint','allpatientController@saveappoint');
		Route::any(' /loadapoint','allpatientController@loadapoint');
		Route::any(' /updateappoint','allpatientController@updateappoint');
		Route::any('/deleteappoint','allpatientController@deleteappoint');
		Route::any(' /loadrange','allpatientController@loadrange');
		Route::any(' /saverange','allpatientController@saverange');
		Route::any(' /saveunit','allpatientController@saveunit');
		Route::any(' /loadunits','allpatientController@loadunits');
		Route::any(' /saveorders','allpatientController@saveorders');
		Route::any(' /loadtestsunit','allpatientController@loadtestsunit');
		Route::any('/loadgridtest','allpatientController@loadgridtest');
		Route::any('/loadunit','allpatientController@loadunit');
		Route::any('/savesendorder','allpatientController@savesendorder');
		Route::any('/testorders','allpatientController@testorders');
		Route::any(' /updateorder','allpatientController@updateorder');
		Route::any('/savepaymentmethod','allpatientController@savepaymentmethod');
		Route::any(' /deletetests','allpatientController@deletetests');
		Route::any(' /returnmoney','allpatientController@returnmoney');
		Route::any(' /labtest','allpatientController@labtest');
		Route::any(' /spicement','allpatientController@spicement');
		Route::any(' /speciallabpatient','allpatientController@speciallabpatient');
		Route::any(' /resultrange','allpatientController@resultrange');
		Route::any(' /lastresult','allpatientController@lastresult');
		Route::Any(' /resultcontent','allpatientController@resultcontent');
		Route::Any(' /loadstrenght','allpatientController@loadstrenght');
		Route::Any(' /savemedication','allpatientController@savemedication');
		Route::Any(' /saveprescipt','allpatientController@saveprescipt');
		Route::Any(' /loadprescription','allpatientController@loadprescription');
		Route::Any(' /savestyle','allpatientController@savestyle');
		Route::Any(' /printpdf','allpatientController@indexpage');
		Route::Any('/printpdfs','allpatientController@printpdf');
		Route::Any(' /savestrenght','allpatientController@savestrenght');
		Route::Any(' /loadstrenghtss','allpatientController@loadstrenghtss');
		Route::Any(' /loaddiagnosis','conditionController@loaddiagnosis');
		Route::Any(' /savecondition','conditionController@savecondition');
		Route::Any(' /loadcondition','conditionController@loadcondition');
		Route::Any(' /checkpatientreturn','conditionController@checkpatientreturn');
		Route::Any(' /updatereview','conditionController@updatereview');
		Route::Any(' /measurement','conditionController@measurement');
		Route::Any(' /cancels','conditionController@cancels');
		Route::Any(' /loadmeasure','conditionController@loadmeasure');
		Route::Any(' /measuregrid','conditionController@measuregrid');
		Route::Any('/loaddoctors','doctorsController@loaddoctors');
		Route::any('/doctor/{id}',array('as' =>'doctorprofile' ,'uses'=>'doctorsController@getdoctor' ));
		Route::get('/logout', 'Auth\LoginController@logout');
		Route::any('/loadhomegrap', 'doctorsController@loadhomegrap');
		Route::get('/find', 'searchController@find');
		Route::any('/loadmedications', 'conditionController@loadmedications');
		Route::any('/edit', 'editController@home');
		Route::any('/loadid', 'editController@loadid');
		Route::any('/deleteitem', 'editController@deleteitem');
		Route::any('/loadpay', 'editController@loadpay');
		Route::any('/lab', 'labController@loadlab');
		Route::any('/usersvalidator', 'doctorsController@usersvalidator');
		Route::any('/loadrole', 'editController@loadrole');
		Route::any('/loadactivity', 'editController@loadactivity');
		Route::any('/saveactivity', 'editController@saveactivity');
		Route::any('/role', 'roleController@home');
		Route::any('/saverole', 'roleController@saverole');
		Route::any('/loadroles', 'roleController@loadroles');		
		Route::any('/loadsubrole', 'roleController@loadsubrole');
		Route::any('/chart', 'chartController@index');
		Route::any('/savechart', 'chartController@savechart');		
		Route::any('/loadchart', 'chartController@loadchart');	
		Route::any('/journal', 'chartController@journal');	
		Route::any('/savegrid', 'chartController@savegrid');
		Route::any('/loadchartlist', 'chartController@loadchartlist');
		Route::any('/journalload', 'chartController@journalload');*/

							
	
Route::get('/logout', 'Auth\LoginController@logout');	
});

