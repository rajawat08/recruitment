<?php

class Candidate extends \Eloquent {

	protected $table = "candidates";

	protected $guarded = [];

	public static $rules = [	 	
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:20'
        
    ];

    public function user(){
    	return $this->belongsTo('User');
    }
}