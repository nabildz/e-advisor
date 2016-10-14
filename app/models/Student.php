<?php
class Student extends Eloquent {

	protected $table = 'students';

	public static $rules = array
	(
		'name' => 'required',
		'username' => 'required',
		'password' => 'required',
		'depratment' => 'required',

	);
	
	public function getImageUrlAttribute()
	{
		if($this->image !== '')
			return asset('/uploads/organizations/' . $this->image);
		return '';
	}
}