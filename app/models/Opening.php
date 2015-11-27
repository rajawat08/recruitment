<?php

class Opening extends \Eloquent {
	
	Protected $guarded = [];

	public static $rules = [
		'position_title' => 'required',
		'client_id' => 'required'
		

	];

	  /**
     * client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('Client');
    }

}