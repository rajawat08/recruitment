<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
class Role extends \Eloquent {
	protected $table = 'roles';

	/**
	 * Fillable property.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug', 'description'];

	public static $rules = [
	 	 'name' => 'required',
	     'slug' => 'required|unique:roles,slug'
    ];
	/**
	 * Relation to "Permission".
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function permissions()
	{
		return $this->belongsToMany('Permission')->withTimestamps();
	}

	/**
	 * Relation to "User".
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany("User")->withTimestamps();
	}

	/**
	 * Check whether the user role can perform the given permission.
	 *
	 * @param  string  $permission
	 * @return boolean
	 */
	public function can($permission)
	{
		return in_array($permission, array_fetch($this->permissions->toArray(), 'slug'));
	}

	/**
	 * Handle dynamic method.
	 *
	 * @param  string  $method  
	 * @param  array   $parameters  
	 * @return boolean
	 */
	public function __call($method, $parameters = array())
	{
		if(starts_with($method, 'can') and $method != 'can')
		{
			return $this->can(snake_case(substr($method, 3)));
		}
		else
		{
			$query = $this->newQuery();

			return call_user_func_array(array($query, $method), $parameters);
		}
	}
}