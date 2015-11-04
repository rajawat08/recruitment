<?php

class Permission extends \Eloquent {
	protected $table = 'permissions';

	/**
	 * Fillable property.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug', 'description'];
	
	public static $rules =  [
	        'name' => 'required',
	        'slug' => 'required|unique:permissions,slug'
	    ];
	/**
	 * Relation to "Role".
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function roles()
	{
		return $this->belongsToMany('Role')->withTimestamps();
	}
}