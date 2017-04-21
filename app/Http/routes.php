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

// Route::post('/appointment', ['uses' => 'AppointmentController@store',
//    'as' => 'appointment',
//    ]);
//
Route::group(['prefix' => '/appointment'], function() {
    Route::post('/create', ['uses' => 'AppointmentController@store',
        'as' => 'appointment',
    ]);
    Route::post('/{id}/edit', ['uses' => 'AppointmentController@edit',
        'as' => 'appointment',
    ]);
    Route::put('/{id}/edit', ['uses' => 'AppointmentController@edit',
        'as' => 'appointment',
    ]);
    Route::delete('/{id}/delete', ['uses' => 'AppointmentController@destroy',
        'as' => 'appointment',
    ]);
    Route::get('/{id}', ['uses' => 'AppointmentController@show',
        'as' => 'appointment',
    ]);
    Route::get('/', ['uses' => 'AppointmentController@index',
        'as' => 'appointment',
    ]);
});
//
Route::group(['prefix' => '/patient'], function() {
    Route::post('/create', ['uses' => 'PatientController@store']);
    Route::post('/{id}/edit', ['uses' => 'PatientController@edit']);
    Route::put('/{id}/edit', ['uses' => 'PatientController@edit']);
    Route::delete('/{id}/delete', ['uses' => 'PatientController@destroy']);
    Route::get('/{id}/delete', ['uses' => 'PatientController@destroy']);
    Route::get('/{id}', ['uses' => 'PatientController@show']);
    Route::get('/', ['uses' => 'PatientController@index']);
});
//Route::resource('appointment', function($id = null){
//    echo "doctor READ".$id;
//});
////Route::resource('doctor','DoctorController');