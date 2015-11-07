<?php

class Country extends \Eloquent {

	protected $table = 'country';

	public $timestamps = false;
	
	protected $fillable = ['name', 'code'];
}