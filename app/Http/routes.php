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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*User*/
Route::get('user', 'UserController@index');
Route::get('user/event', 'EventController@index');
Route::get('user/question/{id}', 'QuestionController@index');
Route::post('user/question/{id1}/submit/{id2}', array('before' => 'csrf', 'uses' => 'QuestionController@submit'));

/*Assistant*/
Route::get('assistant', 'AdminController@index');

/*Admin*/
Route::get('admin', 'AdminController@index');
Route::get('admin/user', 'AccountController@index'); /*sudah*/
Route::get('admin/user/create', 'AccountController@create');


/*<!--Event-->*/
Route::get('admin/event', 'EventController@index'); /*sudah*/
Route::get('admin/event/create', 'EventController@create');
Route::post('admin/event/create', array('before' => 'csrf', 'uses' => 'EventController@create'));
Route::get('admin/event/update/{id}', 'EventController@update');
Route::post('admin/event/update/{id}', array('before' => 'csrf', 'uses' => 'EventController@update'));
Route::get('admin/event/delete/{id}', 'EventController@destroy');
Route::post('admin/event/delete/{id}', array('before' => 'csrf', 'uses' => 'EventController@destroy'));
Route::get('admin/event/parser/start/{id}', 'EventController@parserStart');/*sudah*/
Route::get('admin/event/parser/stop/{id}', 'EventController@parserStop');/*sudah*/

/*Question*/
Route::get('admin/question/{id}', 'QuestionController@index');
Route::post('admin/question/{id}', array('before' => 'csrf', 'uses' => 'QuestionController@index'));
Route::get('admin/question/{id}/create', 'QuestionController@create');
Route::post('admin/question/{id}/create', array('before' => 'csrf', 'uses' => 'QuestionController@create'));
Route::get('admin/question/{id1}/update/{id2}', 'QuestionController@update');
Route::post('admin/question/{id1}/update/{id2}', array('before' => 'csrf', 'uses' => 'QuestionController@update'));
Route::get('admin/question/{id1}/delete/{id2}', 'QuestionController@destroy');
Route::post('admin/question/{id1}/delete/{id2}', array('before' => 'csrf', 'uses' => 'QuestionController@destroy'));

/*Calendar*/
Route::get('admin/calendar', 'AdminController@calendar');

/*View Submission*/
Route::get('admin/event/viewSubmission', 'EventController@viewSubmissions');/*sudah*/
Route::post('admin/event/viewSubmission', 'EventController@viewSubmissions');/*sudah*/
Route::get('admin/event/viewSubmissionSubmit/{id}', 'EventController@viewSubmissionsSubmit');/*sudah*/


/*Scoreboard*/
Route::get('admin/scoreboards', 'AdminController@scoreboards');/*sudah*/
Route::post('admin/scoreboards', array('before' => 'csrf', 'uses' => 'AdminController@scoreboards'));
Route::get('user/scoreboards', 'UserController@scoreboardsUser');
Route::post('user/scoreboards', array('before' => 'csrf', 'uses' => 'UserController@scoreboardsUser'));
Route::get('admin/scoreboard/{id}', 'AdminController@scoreboard');
Route::get('admin/scoreboard/refresh/{id}', 'AdminController@refresh');
Route::get('user/scoreboard/{id}', 'UserController@scoreboard');
Route::get('user/scoreboard/refresh/{id}', 'UserController@refresh');

Route::post('admin/user/create', array('before' => 'csrf', 'uses' => 'AccountController@create'));
Route::get('admin/user/update/{id}', 'AccountController@update');
Route::post('admin/user/update/{id}', array('before' => 'csrf', 'uses' => 'AccountController@update'));
Route::get('admin/user/delete/{id}', 'AccountController@destroy');
Route::post('admin/user/delete/{id}', array('before' => 'csrf', 'uses' => 'AccountController@destroy'));
