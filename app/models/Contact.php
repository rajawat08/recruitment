<?php

class Contact extends \Eloquent {

	protected $table = "contacts";

	protected $guarded = [];

	public static $rules = [
		'first_name' => 'required',
		'mobile_phone' => 'required|min:10|max:12',
		'email' => 'required|email'

	];

	  /**
     * user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User','added_by');
    }

      /**
     * manageBy
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manageBy()
    {
        return $this->belongsTo('User','managed_by');
    }

      /**
     * user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('Client');
    }


}