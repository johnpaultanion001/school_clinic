<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LandingpageController@index')->name('landingpage');
Route::get('view/{announcement}', 'LandingpageController@view')->name('view');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/migrate-fresh', function() {
    $exitCode = Artisan::call('migrate:fresh --seed');
    // return what you want
});


Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'Patient', 'middleware' => ['auth']], function () {
   
    //User Update
    Route::get('update', 'UserController@updateshow')->name('updateshow');
    Route::post('update/{user}', 'UserController@update')->name('update');
    Route::put('changepassword/{user}', 'UserController@changepassword')->name('changepassword');

    //Notification
    Route::put('notification/{notif}', 'NotificationController@notification')->name('notification');

});

Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'Patient', 'middleware' => ['auth']], function () {
   
    // 
    Route::resource('appointment', 'AppointmentController');
    // Home
    Route::get('appointment/day/time', 'AppointmentController@validation_day_time')->name('day.time');
    Route::get('appointment/category/services', 'AppointmentController@category_services')->name('appointment.category_services');
    
    Route::get('appointment/validation_of_date_time/validation', 'AppointmentController@validation_of_date_time')->name('appointment.validation_of_date_time');

     // Home
     Route::get('home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

   
    Route::resource('appointment', 'AppointmentController');

     Route::get('patient_list', 'PatientListController@index')->name('patient');
     Route::get('patient_list/{user}/edit', 'PatientListController@edit')->name('patient.edit');
     Route::put('patient_list/{user}', 'PatientListController@update')->name('patient.update');
     Route::put('patient_list/{user}/dpass', 'PatientListController@defaultPassowrd')->name('patient.dpass');

     Route::resource('announcements', 'AnnouncementsController');
     Route::post('announcements/update/{announcement}', 'AnnouncementsController@updateannouncement')->name('announcements.updateannouncement');

     Route::resource('services', 'ServiceController');
     Route::get('date_time', 'ServiceController@date_time')->name('date_time');

     Route::resource('doctors', 'DoctorController');

     Route::get('doctor/appointments', 'DoctorController@accept_appointment')->name('doctor.appointment');
     Route::get('doctor/account', 'DoctorController@account')->name('doctor.account');
     Route::get('doctor/account/{user}', 'DoctorController@update_account')->name('doctor.update_account');

     Route::get('doctor/appointment/available', 'DoctorController@available')->name('doctor.available');
     Route::get('doctor/appointment/complete', 'DoctorController@complete')->name('doctor.complete');

     Route::get('patients/finder/doctor', 'DoctorController@finder_doctor')->name('doctor.finder_doctor');


    //  Route::get('historical/move', 'HistoricalController@move')->name('historical.move');
     Route::get('historical/filter/{filter}', 'HistoricalController@appointments_reports')->name('historical');

     Route::get('activity_log', 'ActivityLogController@activity_log')->name('activity_log');

     
});
