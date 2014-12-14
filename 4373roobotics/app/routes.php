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
Route::get('/media/gallery', function() {
	return View::make('mediagallery');
});
Route::get('/image/download/{id}', array('as'=>'downloadimage', 'uses'=>'ImageController@download'));
Route::post('/user/login', 'UserController@doLogin');
Route::get('/user/logout', 'UserController@logout');
// Route::get('/makegroups', 'UserController@makeGroups');
// Route::get('/makehenry', 'UserController@createHenry');
Route::get('/account/delete/{id}', array('as'=>'deleteuser', 'before'=>'admin | csrf', 'uses' => 'UserController@delete'));
Route::get('/account/toggleaccess/{id}', array('as'=>'toggleuseraccess', 'before'=>'admin | csrf', 'uses' => 'UserController@switchAccess'));
Route::get('/user/signup', function() {
	return View::make('register');
});
Route::post('/user/signup', array('as'=>'signup', 'before'=>'csrf | guest', 'uses'=>'UserController@requestAccount'));
Route::get('/user/login', function() {
	return View::make('login');
});
Route::get('/user/home', 'UserController@showHome');
Route::get('/account/toggle/{id}', array('as'=>'toggle', 'before'=>'admin | csrf', 'uses' => 'UserController@toggleAccount'));
Route::get('/date', function() {
	return 'lol'.date('-d_m_y_g_i_s_a-').str_random(7);
});
Route::post('/image/upload', array('as'=>'upload', 'before'=>'auth | csrf', 'uses' => 'ImageController@upload'));
Route::get('/image/delete/{id}', array('as'=>'delete', 'before'=>'auth | csrf', 'uses'=>'ImageController@delete'));