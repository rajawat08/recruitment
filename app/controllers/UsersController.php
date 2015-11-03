<?php

class UsersController extends \BaseController {

	 /**
     * @var \User
     */
    protected $users;

    /**
     * @param \User $users
     */
    public function __construct(User $user)
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        //Initialize User modal
        $this->users = $user;  
    }

    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return $this->redirect('users.index');
    }

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->users->paginate(10);
        $no = $users->getFrom();

        return View::make('users.index', compact('users', 'no'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        //app('Pingpong\Admin\Validation\User\Create')->validate($data = $this->inputAll());
        $validation = Validator::make(Input::all(), User::$rules);
        if (!$validation->passes()) {
            return Redirect::route('users.create')
                ->withInput()
                ->withErrors($validation)
                ->with('flash_error', 'There were validation errors.');
        }

        $input = array_filter(
            Input::except('_token'),
            function ($val) {
                return !empty($val);
            }
        );
        $user = $this->users->create($input);

        $user->addRole(\Input::get('role'));

        return Redirect::route('users.index');
    }

    /**
     * Display the specified user.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try
        {
            $user = $this->users->findOrFail($id);
            return $this->view('users.show', compact('user'));
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            $user = $this->users->findOrFail($id);

            $role = $user->getRole() ? $user->getRole()->id : null;

            return View::make('users.edit', compact('user', 'role'));
        }
        catch (ModelNotFoundException $e)
        {
            //return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        try
        {   
            $data = ! \Input::has('password') ? \Input::except('password') : $this->inputAll();
            
            
                
            
            $validation = Validator::make(Input::all(), User::$rules);
            if (!$validation->passes()) {
                 return Redirect::route('users.edit', $id)
                ->withInput()
                ->withErrors($validation)
                ->with('flash_error', 'There were validation errors.');
            }
            $user = $this->users->findOrFail($id);

             $input = array_filter(
                Input::except('_token'),
                function ($val) {
                    return !empty($val);
                }
            );
            $user->update($data);

            $user->updateRole(\Input::get('role'));

            return $this->redirect('users.index');
        }
        catch (ModelNotFoundException $e)
        {
           // return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            $this->users->destroy($id);

            return Redirect::route('users.index');
        }
        catch (ModelNotFoundException $e)
        {
            //return $this->redirectNotFound();
        }
    }

}