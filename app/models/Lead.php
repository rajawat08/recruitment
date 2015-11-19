<?php

class Lead extends \Eloquent {

	protected $table = "leads";

	protected $guarded = [];

	public static $rules = [
		'first_name' => 'required',
		'mobile_phone' => 'required|min:10|max:12',
		'email' => 'required|email'

	];

	public function user(){
		return $this->belongsTo("User","managed_by");
	}

	public function getNameAttribute(){
    	
    	return $this->attributes['first_name']." ".$this->attributes['last_name'];
    }

}