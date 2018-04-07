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
	Route::any('/savepayment','paymentController@savepayment');
	Route::any('/labpayment','labController@labpayment');
});
Route::get('/logout', 'Auth\LoginController@logout');