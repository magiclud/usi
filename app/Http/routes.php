<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
//Route::get('doctor/{id?}', array('as' => 'doctor.get', 'uses' => 'DoctorController@show'));
//sAga - ok
//? below - means id - optional
//Route::get('/doctor/{id?}', function($id = null){
//    echo "dsoctor READ".$id;
//});
//Route::get('/doctor', ['uses' => 'DoctorController@create',
//    'as' => 'doctor.create',
//]);
//
//Route::post('/doctor/create', ['uses' => 'DoctorController@store']);
Route::group(['prefix' => '/doctor'], function() {
    Route::post('/create', ['uses' => 'DoctorController@store']);
    Route::post('/{id}/edit', ['uses' => 'DoctorController@update']);
    Route::post('/{id}/appointment', ['uses' => 'DoctorController@doctor_appointments_by_date']);
    Route::put('/{id}/edit', ['uses' => 'DoctorController@update']);
    Route::delete('/{id}/delete', ['uses' => 'DoctorController@destroy']);
    Route::get('/{id}/delete', ['uses' => 'DoctorController@destroy']);
    Route::get('/{doctor_id}/appointment', ['uses' => 'DoctorController@read_appointments']);
    Route::get('/{doctor_id}/appointment/{id}', ['uses' => 'DoctorController@read_appointment']);
    Route::get('/speciality/{id}', ['uses' => 'DoctorController@doctors_by_speciality']);
    Route::get('/{id}', ['uses' => 'DoctorController@show']);
    Route::get('/', ['uses' => 'DoctorController@index']);
});
Route::group(['prefix' => '/appointment'], function() {
    Route::post('/create', ['uses' => 'AppointmentController@store']);
    Route::post('/{id}/edit', ['uses' => 'AppointmentController@update']);
    Route::put('/{id}/edit', ['uses' => 'AppointmentController@update']);
    Route::delete('/{id}/delete', ['uses' => 'AppointmentController@destroy']);
    Route::get('/{id}', ['uses' => 'AppointmentController@show']);
    Route::get('/', ['uses' => 'AppointmentController@index']);
});
//
Route::group(['prefix' => '/patient'], function() {
    Route::post('/create', ['uses' => 'PatientController@store']);
    Route::post('/{id}/edit', ['uses' => 'PatientController@update']);
    Route::put('/{id}/edit', ['uses' => 'PatientController@update']);
    Route::delete('/{id}/delete', ['uses' => 'PatientController@destroy']);
    Route::get('/{patient_id}/appointment', ['uses' => 'PatientController@read_appointments']);
    Route::get('/{patient_id}/appointment/{id}', ['uses' => 'PatientController@read_appointment']);
    Route::get('/{id}/delete', ['uses' => 'PatientController@destroy']);
    Route::get('/{id}', ['uses' => 'PatientController@show']);
    Route::get('/', ['uses' => 'PatientController@index']);
});

Route::group(['prefix' => '/speciality'], function() {
    Route::post('/{id}/edit', ['uses' => 'SpecialityController@update']);
    Route::get('/{id}', ['uses' => 'SpecialityController@show']);
    Route::get('/', ['uses' => 'SpecialityController@index']);
});
//Route::resource('appointment', function($id = null){
//    echo "doctor READ".$id;
//});
////Route::resource('doctor','DoctorController');