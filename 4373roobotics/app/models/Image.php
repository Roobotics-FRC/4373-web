<?php
class Image extends Eloquent {
	
	protected $table = 'images';

	// protected static $imageUserssPivot = 'users_groups';

	protected $fillable = array('description', 'name', 'file_path', 'public');

	public function user() {
		return $this->belongsTo('User');
	}
}