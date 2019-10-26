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

// Registration Routes
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
// Session Routes
Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout', 'SessionController@destroy');
// Tutee Routes
Route::get('/tuteedashboard','TuteeController@index');
Route::post('/booking','TuteeController@store');
// Tutor Routes
Route::get('/tutorschedule','TutorController@create');
Route::get('/request','TutorController@bookingrequest');
Route::get('/tutorprofile','TutorController@index');
Route::get('/tutordashboard','TutorController@tutordashboard');
Route::post('/addtutorschedule/{user}','TutorController@store');
Route::post('/addinfo','TutorController@store1');
Route::post('/updaterequest/{user}','TutorController@update');
// Admin Routes
Route::get('/admindashboard','AdminController@show');
Route::get('/subject','AdminController@index');
Route::get('/location','AdminController@index2');
Route::post('/addsubject','AdminController@store');
Route::post('/addlocation','AdminController@store2');
Route::post('/updatetutor/{user}','AdminController@update');



