<?php

class HomeController extends BaseController {

	protected $user;


	 public function __construct(User $user)
    {
    	 
        $this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        //Initialize User modal
        $this->user = $user;  
    }

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('index');
	}

	 /**
     * Logout.
     *
     * @return \Response
     */
    public function logout()
    {
        Auth::logout();

       

        return $this->redirect('login.index');
    }

}
