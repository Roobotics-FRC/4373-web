<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	// ------------------------------------------------------------------------------------------------
	// Some secrutity stuff, don't delete!
	// With <3 from henry :P
	// Note that none of these are a substitute for proper security practices, just a fallback if the worst should happen
	// ------------------------------------------------------------------------------------------------
	header('X-Frame-Options: deny'); // Anti clickjacking
	header('X-XSS-Protection: 1; mode=block'); // Anti cross site scripting (XSS)
	header('X-Content-Type-Options: nosniff'); // Reduce exposure to drive-by dl attacks
	// header('Content-Security-Policy: default-src \'self\''); // Reduce risk of XSS, clickjacking, and other stuff
	// Don't cache stuff (we'll be updating the page frequently)
	header('Cache-Control: nocache, no-store, max-age=0, must-revalidate');
	header('Pragma: no-cache');
	header('Expires: Fri, 01 Jan 1990 00:00:00 GMT');
	// // Archer :D
	header('X-Archer: DANGER ZONE');
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (!Sentry::check())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::guest('/user/login');
	}
});

Route::filter('admin', function() {
	if (Sentry::check()) {
		if (!(Sentry::getUser()->hasAccess('admin'))) {
			return View::make('notfound');
		}
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Sentry::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		return "Your browser does currently have cookies enabled for this site. \nYou will not be able to use most of it's functions.";
		// throw new Illuminate\Session\TokenMismatchException;
	}
});
