<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel {

	public function logevents() {
		return $this->hasMany('Logevent');
	}

	public function images() {
		return $this->hasMany('Image');
	}

	public function textclippings() {
		return $this->hashMany('Textclipping');
	}

	public function events() {
		return $this->belongsToMany('Event');
	}

}
