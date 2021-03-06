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

Route::get('/', function () {
    return view('frontend.home');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/postLogin', ['as' => 'postLogin', 'uses' => "Auth\AuthController@postLogin"]);

// Phần Doctor
Route::group(['prefix' => 'doctor'], function () {
    Route::get('/', ['as' => 'doctor.index', 'uses' => "Backend\Doctor\DoctorController@index"]);

    // ---------- Độ cận từng học sinh -----------
    Route::get('/student-one', "Backend\Doctor\DoctorController@studentOne");

    // ---------- Độ cận của một lớp học -----------
    Route::get('/class-one', "Backend\Doctor\DoctorController@classOne");
    Route::get('/class-many-years', "Backend\Doctor\DoctorController@classManyYears");


    // Phần get dữ liệu vào combox
    Route::group(['prefix' => 'data'], function () {
        Route::get('/schools', "Backend\DataController@getSchools");
        Route::get('/student-eyesight', ['as' => 'getStudentEyesight', 'uses' => "Backend\DataController@getStudentEyesight"]);
        Route::get('/getAcademics', "Backend\DataController@getAcademics");
        Route::get('/getClass', "Backend\DataController@getClass");
        Route::get('/getClassEyesight', "Backend\DataController@getClassEyesight");
        Route::get('/getEyesight', "Backend\DataController@getEyesight");

        // Độ tận của một lớp học theo từng năm
        Route::get('/getClassManyYearsEyesight', "Backend\DataController@getClassManyYearsEyesight");
    });

});




// Phần frontend

Route::get('/tra-cuu', ['as' => 'tra-cuu', 'uses' => "Backend\Doctor\DoctorController@studentOneFrontend"]);
Route::get('data/student-eyesight', ['as' => 'getStudentEyesight', 'uses' => "Backend\DataController@getStudentEyesight"]);

//Route::resource('hocsinh', "HocSinhController");

Route::get('/hash', function () {
    return Hash::make(234567);
});
