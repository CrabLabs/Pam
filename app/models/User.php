<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Insted of deleting from the database, set a deleted_at timestamp on the record.
	 *
	 * @var boolean
	 */
	public $softDeletes = true;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Get the user orders.
	 *
	 * @return array
	 */
	public function orders()
	{
		return $this->hasMany('Order');
	}

	/**
	 * Get the user budgets.
	 *
	 * @return array
	 */
	public function budgets()
	{
		return $this->hasMany('Budget');
	}

	/**
	 * Get the user profile picture.
	 *
	 * @return string
	 */
	public function getImage()
	{
		return URL::to('img/uploads/users/originals/'.$this->image);
	}

}