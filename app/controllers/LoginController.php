<?php

class LoginController extends \BaseController {


	    /**
     * Show login page.
     *
     * @return mixed
     */
    public function index()
    {
    	
        return View::make('login');
    }

    /**
     * Login action.
     *
     * @return mixed
     */
    public function store()
    {
        $credentials = Input::only('username', 'password');
        $remember = Input::has('remember');

        if (Auth::attempt($credentials, $remember))
        {
           
            $_SESSION['admin'] = Auth::id();

            return Redirect::to('/openings')->withFlashMessage('Login Success!');
        }

        // if (getenv('TESTING'))
        // {
        //     return Redirect::to('/login')->withFlashMessage("Login failed!")->withFlashType('danger');
        // }

        return Redirect::back()->withFlashMessage("Login failed!")->withFlashType('danger');
    }

}