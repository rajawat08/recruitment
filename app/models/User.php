<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
use commands\Trusty\TrustyTrait;
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,TrustyTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static $rules = [
	 	'name' => 'required',
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:20',
        //'password_confirmation' => 'required|alpha_num|between:6,12'
    ];
   
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
     * The fillable property.
     *
     * @var array
     */
    protected $fillable = array('name', 'username', 'email', 'password', 'status');

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    /**
    * @param $date
    */
    public function getCreatedAtAttribute(){
        //return date("F j, Y",strtotime($this->attributes['created_at'])); working fine
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('M j,Y');
    }

    /**
     * hasMany clients
     */
    public function clients()
    {
        return $this->hasMany('Client');
    }

}
