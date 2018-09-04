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
	Route::any('/complete/edit','doctorsController@editdetail');
	Route::any('/savelastupdate','doctorsController@savelastupdate');
	Route::any('/educationDoctor','doctorsController@education');
	Route::any('/doctors/unapproved','doctorsController@approved')->name(__('titles.approved').' | '.config('app.name'));
	Route::any('/doctors/appoints','doctorsController@appoints')->name(__('titles.doctorAppoint').' | '.config('app.name'));
	Route::any('/doctors/appointview','doctorsController@appointview');
	Route::any('/doctors/appointmentStatusChange','doctorsController@appointmentStatusChange');
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



Route::any('/registerfeed','feedController@registerFeed');
Route::any('/listjsonPayment','paymentController@jsonPaymentMethod');
Route::any('/appointpayment','paymentController@appointpayment');


Route::any('/payments','paymentController@generalpays');
Route::any('patients/mypaysPatient','paymentController@mypaysPatient');




Route::any('healthfeed','feedController@index')->name(__('titles.feed').' | '.config('app.name'));




							
	
Route::get('/logout', 'Auth\LoginController@logout');	
});

