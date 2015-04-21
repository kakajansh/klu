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

Route::get('templates', 'TemplatesController@index');
Route::get('templates/create', 'TemplatesController@create');
Route::post('templates/store', 'TemplatesController@store');
Route::get('templates/{id}', 'TemplatesController@show');
Route::get('templates/setup/{id}', 'TemplatesController@setup');
Route::post('templates/save/{id}', 'TemplatesController@save');

Route::get('courses', 'CoursesController@index');
Route::get('courses/create', 'CoursesController@create');
Route::post('courses', 'CoursesController@store');
Route::get('courses/{id}', 'CoursesController@show');
Route::get('courses/attend/{id}', 'CoursesController@attend');

Route::get('/', 'UsersController@main');
Route::get('users', 'UsersController@index');
Route::get('users/{id}', 'UsersController@show');
Route::get('profile', 'UsersController@profile');

Route::get('awards/show/{courseid}/{userid}', 'AwardsController@show');

// ///////////

Route::get('fabric', 'WelcomeController@index');

Route::get('pdo', 'WelcomeController@pdf');

Route::get('multi', 'WelcomeController@multi');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
