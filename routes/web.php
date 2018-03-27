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
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::any('/', 'HomeController@index')->name('index');
	Route::any('/patients', 'customerController@patient')->name('patient');
	Route::any('/savepatient', 'customerController@savepatient');
	Route::any('/sendgriddata', 'customerController@sendgriddata');
	Route::any('/doctors', 'doctorsController@doctor')->name('doctors');
	Route::any('/savedoctor','doctorsController@savedoctor');
	Route::any('/loaddoctors','doctorsController@loaddoctors');
	Route::any('/patients/{id}',array('as' =>'patients.singlepatient' ,'uses'=>'pprofileController@getpatient' ));
	Route::any('/editor','editorController@editor');
	Route::any('/cancels','editorController@cancels');
	Route::any('/tests','testsController@home');
	Route::any('/savegroup','testsController@savegroup');
	Route::any('/loadtest','testsController@loadtest');
	Route::any('/savetestorder','testsController@savetestorder');
	Route::any('/patients/{id}/add',array('as' =>'patients/add' ,'uses'=>'addController@add' ));
	Route::any('/patients/{id}/loadtest','testsController@loadtest');
	Route::any('/patients/{id}/saveorder','addController@saveorder');
	Route::any('/loadptest','pprofileController@loadptest');
	Route::any('/saverange','testsController@saverange');
	Route::any('/loadrange','testsController@loadrange');
	Route::any('/patients/{id}/loadappoint','addController@loadappoint');
	Route::any('/patients/{id}/loadevent','addController@loadevent');
	Route::any('/patients/{id}/newappoint','addController@newappoint');
	Route::any('/mainappoint','pprofileController@mainappoint');
	Route::any('/loadappoint','addController@loadappoint');
	Route::any('/medication','medicationController@home');
	Route::any('/savemedication','medicationController@savemedication');
	Route::any('/loadmedication','medicationController@loadmedication');
	Route::any('/lab', 'labController@lab')->name('lab');
	Route::any('/filter', 'labController@filter')->name('lab');
	Route::any('/payment', 'paymentController@home')->name('payment');
	
	
	
	
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
		Route::any('/journalload', 'chartController@journalload');
		
							
		*/
	});
Route::get('/logout', 'Auth\LoginController@logout');