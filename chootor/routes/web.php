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
Route::get('/tuteedashboard','TuteeController@index');
Route::get('/tuteeprofile','TuteeController@tuteeprofile');
Route::get('/booked','TuteeController@bookeddisplay');
Route::post('/booking','TuteeController@store');
Route::post('/updatetuteeprofile','TuteeController@updateprofile');
// Tutor Routes
Route::get('autocomplete', 'TutorController@autocomplete')->name('autocomplete');
Route::get('/tutorschedule','TutorController@create');
Route::get('/request','TutorController@bookingrequest');
Route::get('/tutorprofile','TutorController@index');
Route::get('/workhistory','TutorController@workhistory');
Route::get('/tutordashboard','TutorController@tutordashboard');
Route::post('/addtutorschedule/{user}','TutorController@store');
Route::post('/addinfo','TutorController@store1');
Route::post('/updaterequest/{booking}','TutorController@update');
Route::post('/updatesession/{booking}','TutorController@sessionstatus');
Route::post('/updatetutorprofile','TutorController@updateprofile');
// Admin Routes
Route::get('/admindashboard','AdminController@show');
Route::get('/subject','AdminController@index');
Route::get('/location','AdminController@index2');
Route::get('/course','AdminController@displaycourse');
Route::get('/list','AdminController@list');
Route::post('/addsubject','AdminController@store');
Route::post('/addlocation','AdminController@store2');
Route::post('/addcourse','AdminController@addcourse');
Route::post('/updatetutor/{user}','AdminController@update');



