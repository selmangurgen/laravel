<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@books');
Route::post('login', 'MainController@postLogin');
Route::get('login','MainController@getLogin');
Route::get('orders','MainController@orders');
Route::post('Disorders','MainController@disapproveOrder');
Route::post('Apporders','MainController@approveOrder');