<?php

class Permission extends \Eloquent {
	protected $table = 'permissions';

	protected $guarded = []; 

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