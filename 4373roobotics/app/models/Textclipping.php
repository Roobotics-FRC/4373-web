<?php
class Textclipping extends Eloquent {
	protected $table = 'textclippings';

	protected $fillable = array('page', 'content');

	public function user() {
		return $this->belongsTo('User');
	}
}