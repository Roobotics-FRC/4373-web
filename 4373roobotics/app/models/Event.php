<?php
public class Event extends Eloquent {
	protected $table = 'events';

	protected $fillable = array('date_due', 'date_start', 'has_time', 'time_start', 'time_end', 'description');
	
	public function user() {
		return $this->belongsTo('User');
	}
}