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

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/secret/admin', function() {
	return Redirect::to('http://akk.li/pics/anne.jpg'); // For the skids :)
});
Route::get('/credits', function() {
	return View::make('credits');
});

Route::post('/user/login', function() {
	return "not implemented";
});

Route::get('/user/login', function() {
	return View::make('login');
});