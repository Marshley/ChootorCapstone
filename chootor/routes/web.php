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

Route::get('/home', function () {
    return view('welcome');
})->name('/home');

Route::get('/bawalkadito', function() {
    return view('bawalkadito');
})->name('bawalkadito');

//Search Routes
Route::get('search', 'SearchController@index')->name('search');
// Registration Routes
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
// Session Routes
Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout', 'SessionController@destroy');
// Tutee Routes
Route::get('/tuteedashboard','TuteeController@index')->name('tuteedashboard')->middleware('role:tutee');
Route::get('/tuteeprofile','TuteeController@tuteeprofile')->middleware('role:tutee');
Route::get('/tnotifications','TuteeController@notifications')->middleware('role:tutee');
Route::get('/booked','TuteeController@bookeddisplay')->middleware('role:tutee');
Route::get('/feedback','TuteeController@donesessiondisplay')->middleware('role:tutee');
Route::post('/booking','TuteeController@store')->middleware('role:tutee');
Route::post('/updatetuteeprofile','TuteeController@updateprofile')->middleware('role:tutee');
Route::post('/feedback/{booking}','TuteeController@feedback')->middleware('role:tutee');
// Tutor Routes
Route::get('autocomplete', 'TutorController@autocomplete')->name('autocomplete');
Route::get('/tutorschedule','TutorController@create')->middleware('role:tutor');
Route::get('/request','TutorController@bookingrequest')->middleware('role:tutor');
Route::get('/tutorprofile','TutorController@index')->middleware('role:tutor');
Route::get('/workhistory','TutorController@workhistory')->middleware('role:tutor');
Route::get('/tutordashboard','TutorController@tutordashboard')->middleware('role:tutor');
Route::get('/notifications','TutorController@notifications')->middleware('role:tutor');
Route::post('/addtutorschedule/{user}','TutorController@store')->middleware('role:tutor');
Route::post('/addinfo','TutorController@store1')->middleware('role:tutor');
Route::post('/updaterequest/{booking}','TutorController@update')->middleware('role:tutor');
Route::post('/updatesession/{booking}','TutorController@sessionstatus')->middleware('role:tutor');
Route::post('/updatetutorprofile','TutorController@updateprofile')->middleware('role:tutor');
// Admin Routes
Route::get('/admindashboard','AdminController@show')->middleware('role:admin');
Route::get('/subject','AdminController@index')->middleware('role:admin');
Route::get('/location','AdminController@index2')->middleware('role:admin');
Route::get('/course','AdminController@displaycourse')->middleware('role:admin');
Route::get('/list','AdminController@list')->middleware('role:admin');
Route::post('/addsubject','AdminController@store')->middleware('role:admin');
Route::post('/addlocation','AdminController@store2')->middleware('role:admin');
Route::post('/addcourse','AdminController@addcourse')->middleware('role:admin');
Route::post('/updatetutor/{user}','AdminController@update')->middleware('role:admin');



