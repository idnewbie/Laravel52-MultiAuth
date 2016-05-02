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

Route::group(['middleware' => 'admin'], function(){

	Route::group(['middleware' => 'auth:admin'], function(){
		Route::get('/admin', 'AdminController@index');
	});
	// Route::get('/admin', 'AdminController@index');

	Route::get('/login', 'LoginController@login');
	Route::post('/login', 'LoginController@testLogin');

	Route::get('/admin/logout', 'AdminController@logout');    
});

Route::group(['middleware' => 'web'], function(){

	// Route::auth();

	Route::get('/login', 'LoginController@Login');
	Route::post('/login', 'LoginController@testLogin');

	Route::get('/home', 'HomeController@index');

	Route::get('/logout', 'LoginController@logout');

	Route::get('/', function () {
	    return view('welcome');
	});

});