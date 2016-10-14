<?php
class Departments extends Eloquent {

	protected $table = 'Departments';

	public static $rules = array
	(
		'prefix' => 'required',
		'title' => 'required',
	);
	
}