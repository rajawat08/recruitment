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

     public function getContractPathAttribute(){
    	return $this->attributes['contract_path'] != "" ? "http://manageamazon.com/CRM/uploads/".$this->attributes['contract_path'] : "";
    }

     /**
     * user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User','added_by');
    }

}