<?php
class Logevent extends Eloquent {
	protected $table = 'logevents';

	protected $fillable = array('ip');
}