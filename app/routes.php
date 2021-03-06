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
Route::get('home',  ['before' => 'auth','as' => 'home',  'uses' =>  'GuideController@home']);
Route::get('guide',  ['before' => 'auth','as' => 'guide',  'uses' =>  'GuideController@guide']);
Route::get('courses',  ['before' => 'auth','as' => 'courses',  'uses' =>  'GuideController@courses']);
Route::post('stored',  ['before' => 'auth','as' => 'store_courses',  'uses' =>  'GuideController@store_courses']);
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::get('login',   ['as' => 'show_login',  'uses' =>  'StudentController@show_Login']);
Route::post('login',  ['as' => 'login',  'uses' =>  'StudentController@do_Login']);
Route::get('logout',  ['before' => 'auth','as' => 'logout',  'uses' =>  'StudentController@do_Logout']);



/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
*/

Route::get('register',  ['as' => 'register',  'uses' =>  'StudentController@register']);
Route::post('regisered',  ['as' => 'store_student',  'uses' =>  'StudentController@store_student']);
Route::get('editinfo',  ['before' => 'auth','as' => 'editinfo',  'uses' =>  'StudentController@editinfo']);
Route::post('updated',  ['as' => 'update_student',  'uses' =>  'StudentController@update_student']);