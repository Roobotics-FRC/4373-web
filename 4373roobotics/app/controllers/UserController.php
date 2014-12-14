<?php
class UserController extends BaseController {
	public function showLogin() {
		return View::make('login');
	}
	public function showHome() {
		if (Sentry::check()) {
			$user = Sentry::getUser();
			if ($user->hasAccess('admin')) {
				return View::make('admin.home');
			}
			else {
				return View::make('user.home');
			}
		}
		else {
			return View::make('login');
		}
	}
	public function doLogin() {
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|min:3'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('/user/login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}
		else {
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);
			try {
				$user = Sentry::authenticate($userdata, false);
				return Redirect::to('/');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
				return Redirect::to('/user/login')
					->withErrors(new MessageBag(array('incorrect' => 'The email field is required.')));
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
				return Redirect::to('/user/login')
					->withErrors(new MessageBag(array('incorrect' => 'The password field is required.')))
					->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
				return Redirect::to('/user/login')
					->withErrors(new MessageBag(array('incorrect' => 'The username or password supplied was incorrect.')))
					->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::to('/user/login')
					->withErrors(new MessageBag(array('incorrect' => 'The username or password supplied was incorrect.')))
					->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
			    return Redirect::to('/user/login')
					->withErrors(new MessageBag(array('incorrect' => 'This account has been suspended by an administrator or has not yet received approval.')))
					->withInput(Input::except('password'));
			}
		}
	}
	public function logout() {
		Sentry::logout();
		return Redirect::to('/user/login')
			->withErrors(new MessageBag(array('incorrect' => 'Successfully logged out')));
	}
	public function requestAccount() {
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:8',
			'first_name' => 'required|alphanum',
			'last_name' => 'required|alphanum',
			'admin' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		$userdata = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'activated' => false
			);
		if ($validator->fails()) {
			return Redirect::to('/user/signup')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}
		try {
			$user = Sentry::register($userdata);
			if (Input::get('admin')) {
				$userGroup = Sentry::findGroupById(1);
			}
			else {
				$userGroup = Sentry::findGroupById(2);
			}
			$user->addGroup($userGroup);
			return Redirect::to('/user/login')
				->withErrors(new MessageBag(array('incorrect' => 'Your account has been created successfully and is now pending admin approval')))
				->withInput(Input::except('password', 'first_name', 'last_name'));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e) {
			return Redirect::to('/user/signup')
				->withErrors(new MessageBag(array('incorrect' => 'An account is already registered under that email address')))
				->withInput(Input::except('password', 'email'));
		}
	}
	public function toggleAccount($id) {
		try {
			$user = Sentry::findUserById($id);
			// dd($user);
			if ($user->activated) {
				$user->activated = 0;
				$user->save();
			}
			else {
				$user->activated = 1;
				$user->save();
			}
			return Redirect::to('/user/home');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return "That user does not exist.";
		}
	}
	public function makeGroups() {
		Sentry::createGroup(array(
		    'name'        => 'administrators',
		    'permissions' => array(
		        'admin' => 1,
		        'users' => 1,
		    ),
		));
		Sentry::createGroup(array(
			'name' => 'users',
			'permissions' => array(
				'admin' => 0,
				'users' => 1,
				),
			));
	}
	public function createHenry() {
		$user = Sentry::register(array(
			'email' => '17henryp@abingtonfriends.net',
			'password' => 'nsr10ojif',
			'first_name' => 'Henry',
			'last_name' => 'Pitcairn',
			'activated' => true,
			));
			$adminGroup = Sentry::findGroupById(1);
			$user->addGroup($adminGroup);
	}
	public function delete($id) {
		try {
			User::find($id)->delete();
		}
		catch (Exceptoin $e) {

		}
		return Redirect::to('/user/home');
	}
	public function switchAccess($id) {
		$admin = Sentry::findGroupByName('administrators');
		$reg = Sentry::findGroupByName('users');
		try {
			$user = User::find($id);

			if ($user->hasAccess('admin')) {
				$user->removeGroup($admin);
				$user->addGroup($reg);
			}
			else {
				$user->removeGroup($reg);
				$user->addGroup($admin);
			}
		}
		catch (Exception $e) {
			// ignore it
		}
		return Redirect::to('/user/home');
	}
	public function updateName($id) {
		$user = User::find($id);
		if ($id == Sentry::getUser()->$id || Sentry::getUser()->hasAccess('admin')) {
			$rules = array(
				'first_name' => 'required|alphanum',
				'last_name' => 'required|alphanum'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$user->first_name = Input::get('first_name');
				$user->last_name = Input::get('last_name');
				$user->save();
			}
			else {
				return Redirect::to('/user/settings')
					->withInput()
					->withErrors($validator);
			}
		}
		else {
			return "Only an admin can change another user's name ;)";
		}
		return Redirect::to('/user/settings');
	}
	public function changePassword($id) {
		$user = User::find($id);
		if ($id == Sentry::getUser()->id) {
			$rules = array(
				'oldpassword' => 'required',
				'newpassword' => 'required|min:8',
				'newpassword_confirmation' => 'required|same:newpassword'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->passes()) {
				$credentials = array($user->email, Input::get('newpassword'));
				if ($user->checkPassword(Input::get('oldpassword'))) {
					$user->password = Input::get('newpassword');
					$user->save();
					return Redirect::to('/user/settings')
						->withErrors(new MessageBag(array('oldpassword'=>'Password changed successfully')));
				}
				else {
					return Redirect::to('/user/settings')
						->withErrors(new MessageBag(array('oldpassword'=>'The password you supplied was incorrect')));
				}
			}
			else {
				return Redirect::to('/user/settings')
					->withErrors($validator);
			}
		}
		else {
			return "You may not change another user's password.";
		}
	}
	public function settings() {
		return View::make('edituser');
	}
}