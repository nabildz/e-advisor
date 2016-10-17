<?php
class StudentsCourses extends Eloquent {

	protected $table = 'students_courses';

	public static $rules = array
	(
		'student_id' => 'required',
		'course' => 'required',
	);
	
}