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

Route::get('/doctor', ['uses' => 'DoctorController@create',
    'as' => 'doctor.create',
    ]);
// 
Route::post('/doctor/create', ['uses' => 'DoctorController@create',
    'as' => 'doctor.create',
    ]);

//
//Route::group(['prefix' => '/patient'],function(){
// Route::post('/create', [
//     //Route configuration
// ]);    
//});
//
//Route::resource('appointment', function($id = null){
//    echo "doctor READ".$id;
//});
////Route::resource('doctor','DoctorController');