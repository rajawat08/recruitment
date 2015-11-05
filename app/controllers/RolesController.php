<?php

class RolesController extends \BaseController {

	/**
     * @var 
     */
    protected $roles;

    /**
     * @param  $roles
     */
    public function __construct(Role $roles)
    {
    	$this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        $this->roles = $roles;
    }

    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return Redirect::route('roles.index');
    }

    /**
     * Display a listing of roles
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->roles->paginate(10);
        $no = $roles->getFrom();

        return View::make('roles.index', compact('roles', 'no'));
    }

    /**
     * Show the form for creating a new role
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('roles.create');
    }

    /**
     * Store a newly created role in storage.
     *
     * @return Response
     */
    public function store()
    {   
       
        $validation = Validator::make(Input::all(), Role::$rules);

        if (!$validation->passes()) {
            return Redirect::route('roles.create')
                ->withInput()
                ->withErrors($validation)
                ->withFlashMessage("There were validation errors.")
                ->withFlashType('danger');
        }

        $input = array_filter(
            Input::except('_token'),
            function ($val) {
                return !empty($val);
            }
        );
        $this->roles->create($input);

        
        return $this->redirect('roles.index');
    }

    /**
     * Display the specified role.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try
        {
            $role = $this->roles->findOrFail($id);
            return $this->view('roles.show', compact('role'));
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            $role = $this->roles->findOrFail($id);

            $permission_role = $role->permissions->lists('id');

            return $this->view('roles.edit', compact('role', 'permission_role'));
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified role in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        try
        {

        	Role::$rules = [
	        'name' => 'required',
	        'slug' => 'required|unique:roles,slug,' . $id
	    	];

        	$validation = Validator::make(Input::all(), Role::$rules);
	        if (!$validation->passes()) {
	            return Redirect::route('roles.edit',$id)
	                ->withInput()
	                ->withErrors($validation)
	                ->withFlashMessage("There were validation errors.")
	                ->withFlashType('danger');
	                
	        }

	        $input = array_filter(
	            Input::except('_token'),
	            function ($val) {
	                return !empty($val);
	            }
	        );
            $role = $this->roles->findOrFail($id);

            $role->update($input);
            
            if($role->permissions->count() || count(Input::get('permissions')))
            {
                $role->permissions()->detach($role->permissions->lists('id'));
                if(count(Input::get('permissions')))
                $role->permissions()->attach(Input::get('permissions'));
                
            }
            
            return $this->redirect('roles.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            $this->roles->destroy($id);

            return $this->redirect('roles.index');
        }
        catch (ModelNotFoundException $e)
        {
            return $this->redirectNotFound();
        }
    }


}