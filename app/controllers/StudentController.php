<?php

class StudentController extends \BaseController {


	public function show_Login()
	{
	    return View::make('login');
	}

    public function doLogin()
	{
		$rules = array(
		    'username'    => 'required', 
		    'password' => 'required|min:3' 
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
			{

		    return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));

		    $userdata = array(
		        'username'     => Input::get('username'),
		        'password'  => Input::get('password')
		    );

		    if (Auth::attempt($userdata)) {
		         return Redirect::to('home');
		    } 
		    else {        
		        return Redirect::to('login');
		    }
		}

	}

    public function doLogout()
	{
	    Auth::logout(); 
	    return Redirect::to('login');
	}

	public function register()
	{
		$departments = Departments::all();
		return View::make('student.register', array('departments' => $departments));
	}

	public function store_student()
	{

		//dd($_POST);

		$messsages = array(
        'name' => 'required',
		'username' => 'required',
		'password' => 'required',
		'depratment' => 'required',

    );
		 $rules = array(
		'name' => 'required',
		'username' => 'required',
		'password' => 'required',
		'depratment' => 'required',

	);
		$validator = Validator::make(Input::all(), $rules,$messsages);
		if ($validator->fails()) {
		$messages = $validator->messages();
		return Redirect::to('register')->withInput(Input::except('password'))->withErrors($validator);
		} 
		else {

		$student = new Student;
		$student->name = Input::get('name');
		$student->username = Input::get('username');
		$student->password = Input::get('password');
		$student->depratment = Input::get('depratment');

        if ($student->save()) {
        	 return Response::view('warnings.success');
        }
		}
		
	}

	public function store()
	{
		return View::make('register');
	}


}
