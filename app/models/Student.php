<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Student extends Eloquent implements UserInterface, RemindableInterface { 

	protected $table = 'students';

	
	use UserTrait, RemindableTrait;

	public static $rules = array
	(
		'name' => 'required',
		'username' => 'required',
		'password' => 'required',
		'depratment' => 'required',

	);


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

}