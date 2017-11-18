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

// For Returning Patients
Route::get('/returnPatients', 'PatientController@retPatientIndex')->name('retPatient');
Route::get('/patient/{patient}/records', 'RecordController@retRecordsIndex')->name('retRecordsIndex');
Route::get('/record/{record}/update', 'RecordController@editNotes')->name('editNotes');
Route::patch('/record/{record}/update', 'RecordController@patchNotes')->name('patchNotes');

// For Existing Patients with New Cases
Route::get('/newCase', 'PatientController@newCaseIndex')->name('newCaseIndex');
Route::get('/patient/{patient}/update','PatientController@newCaseUpdate')->name('newCasePatientUpdate');


// DataTables specific Routes for AJAX data
// For the Doctor
Route::get('/getRecords','RecordController@getRecords')->name('getRecords');
Route::get('/getPatients','PatientController@getRecords')->name('getPatients');
// For the Patient
Route::get('/record/{patient}/data', 'RecordController@retRecords')->name('retRecords');




// Generated Routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('patient', 'PatientController');
Route::resource('record', 'RecordController');


