<?php
class Plans extends Eloquent {

	protected $table = 'plans';

	public static $rules = array
	(
		'version' => 'required',
		'department' => 'required',
		'course' => 'required',
		'pre_courses' => 'required',
		'elective' => 'required',
		'units' => 'required',
	);
	
}