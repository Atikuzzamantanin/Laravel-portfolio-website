<?php

use Illuminate\Support\Facades\Route;

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

// Admin panel Home Section
Route::get('/', 'HomeController@homeIndex')->middleware('loginCheck');

// Admin panel Visit Section
Route::get('/visitpage', 'VisitorController@visitIndex')->middleware('loginCheck');

// Admin panel Service Section
Route::get('/servicepage', 'ServiceController@serIndex')->middleware('loginCheck');
Route::get('/service', 'ServiceController@getServiceData')->middleware('loginCheck');
Route::post('/serviceDelete', 'ServiceController@serviceDelete')->middleware('loginCheck');
Route::post('/serviceDetails', 'ServiceController@getServiceDetails')->middleware('loginCheck');
Route::post('/serviceUpdate', 'ServiceController@serviceUpdate')->middleware('loginCheck');
Route::post('/serviceAdd', 'ServiceController@serviceAdd')->middleware('loginCheck');

//Admin Panel Course Section
Route::get('/coursepage', 'CourseController@corsIndex')->middleware('loginCheck');
Route::get('/course', 'CourseController@getCourseData')->middleware('loginCheck');
Route::post('/courseDelete', 'CourseController@courseDelete')->middleware('loginCheck');
Route::post('/courseDetails', 'CourseController@getCourseDetails')->middleware('loginCheck');
Route::post('/courseUpdate', 'CourseController@courseUpdate')->middleware('loginCheck');
Route::post('/courseAdd', 'CourseController@courseAdd')->middleware('loginCheck');

//Admin Panel Project Section
Route::get('/projectpage', 'ProjectController@projectIndex')->middleware('loginCheck');
Route::get('/project', 'ProjectController@getProjectData')->middleware('loginCheck');
Route::post('/projectDelete', 'ProjectController@projectDelete')->middleware('loginCheck');
Route::post('/projectDetails', 'ProjectController@getProjectDetails')->middleware('loginCheck');
Route::post('/projectUpdate', 'ProjectController@projectUpdate')->middleware('loginCheck');
Route::post('/projectAdd', 'ProjectController@projectAdd')->middleware('loginCheck');

//Admin Panel Contacts Section
Route::get('/contactpage', 'ContactController@contactIndex')->middleware('loginCheck');
Route::get('/contact', 'ContactController@getcontactData')->middleware('loginCheck');
Route::post('/contactDelete', 'ContactController@contactDelete')->middleware('loginCheck');

//Admin Panel Login Section
Route::get('/login', 'LoginController@viewLogin');
Route::post('/onlogin', 'LoginController@onLogin');
Route::get('/logout', 'LoginController@onLogout');

//Admin panel Phonto Gallery Section
Route::get('/photo', 'PhotoController@photoIndex')->middleware('loginCheck');
Route::post('/photoUploed', 'PhotoController@photoUlod')->middleware('loginCheck');
Route::get('/photoJSON', 'PhotoController@photoJSON')->middleware('loginCheck');
Route::get('/photoJSONById/{id}', 'PhotoController@photoJSONById')->middleware('loginCheck');