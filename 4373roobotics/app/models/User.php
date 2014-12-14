<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {



	public function images() {
		return $this->hasMany('Image');
	}

}
