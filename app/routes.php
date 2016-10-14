<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'StudentController@register');
Route::get('guide', 'GuideController@guide');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::get('login',   ['as' => 'show_login',  'uses' =>  'StudentController@show_Login']);
Route::post('login',  ['as' => 'login',  'uses' =>  'StudentController@do_Login']);
Route::get('logout',  ['as' => 'Logout',  'uses' =>  'StudentController@do_Logout']);

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
*/

Route::get('register',  ['as' => 'show_register',  'uses' =>  'StudentController@register']);
Route::post('regisered',  ['as' => 'store_student',  'uses' =>  'StudentController@store_student']);