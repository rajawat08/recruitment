<?php

class Client extends \Eloquent {
	

	protected $table = "clients";

	protected $guarded = [];

	public static $rules = [
		'account_name' => 'required',
		'phone' => 'required|min:10|max:12',
		'email' => 'required|email'

	];


	/**
	 * format created_at date
	 *
	 * @return formated date
	 */
	public function getCreatedAtAttribute(){       
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('M j,Y');
    }

    public function getRevenueTypeAttribute(){
    	return ucfirst($this->attributes['revenue_type'])." Type";
    }

   

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

}