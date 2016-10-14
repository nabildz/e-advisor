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
		return View::make('student.register');
	}

	public function store_student()
	{
		$validator = Validator::make(Input::all(), $rules,$messsages);
		if ($validator->fails()) {
		$messages = $validator->messages();
		return Redirect::to('SubmitOrganization')->withInput()->withErrors($validator);
		} 
		else {


		}
		
	}

	public function store()
	{
		return View::make('register');
	}


}
