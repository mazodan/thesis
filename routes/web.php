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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile','DashboardController@profile')->name('profile');
Route::put('/profile','DashboardController@putProfile')->name('putProfile');

Route::get('/password','DashboardController@password')->name('password');
Route::patch('/password','DashboardController@patchPassword')->name('patchPassword');

// DataTables specific Routes for AJAX data

Route::get('/getRecords','RecordController@getRecords')->name('getRecords');
Route::get('/getPatients','PatientController@getRecords')->name('getPatients');




// Generated Routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('patient', 'PatientController');
Route::resource('record', 'RecordController');


