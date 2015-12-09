<?php

class OpeningUser extends \Eloquent {
	protected $guarded = [];

	  /**
     * opening
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opening()
    {
        return $this->belongsTo('Opening');
    }
}