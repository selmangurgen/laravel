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

Route::get('/', 'MainController@books');
Route::post('login', 'MainController@postLogin');
Route::get('login','MainController@getLogin');
Route::get('orders','MainController@orders');
Route::post('Disorders','MainController@disapproveOrder');
Route::post('Apporders','MainController@approveOrder');
Route::post('deleteBook','MainController@deleteBook');
Route::post('updateBook','MainController@updateBook');
Route::post('createBook','MainController@createBook');
Route::post('getstats','MainController@getstats');
Route::post('adminRegister','MainController@adminRegister');
