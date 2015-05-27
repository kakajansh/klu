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

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', 'AppController@anasayfa');

    Route::get('templates', 'TemplatesController@index');
    Route::get('templates/create', 'TemplatesController@create');
    Route::post('templates/store', 'TemplatesController@store');
    Route::get('templates/{id}', 'TemplatesController@show');
    Route::get('templates/setup/{id}', 'TemplatesController@setup');
    Route::post('templates/save/{id}', 'TemplatesController@save');
    Route::delete('templates/{id}', 'TemplatesController@destroy');

    Route::get('courses', 'CoursesController@index');
    Route::get('courses/create', 'CoursesController@create');
    Route::post('courses', 'CoursesController@store');
    Route::delete('courses/{id}', 'CoursesController@destroy');
    Route::get('courses/edit/{id}', 'CoursesController@edit');
    Route::patch('courses/update/{id}', 'CoursesController@update');
    Route::get('courses/{slug}', 'CoursesController@show');
    Route::get('courses/attend/{id}', 'CoursesController@attend');
    Route::get('courses/upload/{id}', 'CoursesController@upload');
    Route::post('courses/storeUsers', 'CoursesController@storeUsers');

    Route::get('users', 'UsersController@index');
    Route::get('users/edit', 'UsersController@edit');
    Route::delete('users/{id}', 'UsersController@destroy');
    Route::get('users/{id}', 'UsersController@show');
    Route::post('users/update', 'UsersController@update');
    Route::get('/', 'UsersController@profile');

    Route::get('awards/hepsi/{userid}', 'AwardsController@hepsi');
    Route::get('awards/multi/{courseid}', 'AwardsController@multi');

});
// ///////////

Route::post('check', 'AwardsController@check');
Route::get('awards/show/{courseid}/{userid}', ['as' => 'awards.show', 'uses' => 'AwardsController@show']);

Route::get('fabric', 'WelcomeController@index');

// Route::get('login', 'LoginController@index');

Route::get('pdo', 'WelcomeController@pdf');

Route::get('multi', 'WelcomeController@multi');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
