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

Route::get('user', 'UserController@index');
Route::get('assistant', 'AssistantController@index');


Route::get('admin', 'AdminController@index');
Route::get('admin/user', 'AccountController@index');
Route::get('admin/user/create', 'AccountController@create');
Route::post('admin/user/create', array('before' => 'csrf', 'uses' => 'AccountController@create'));
Route::get('admin/user/update/{id}', 'AccountController@update');
Route::post('admin/user/update/{id}', array('before' => 'csrf', 'uses' => 'AccountController@update'));
Route::get('admin/user/delete/{id}', 'AccountController@destroy');
Route::post('admin/user/delete/{id}', array('before' => 'csrf', 'uses' => 'AccountController@destroy'));
