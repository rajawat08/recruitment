<?php

class CandidateController extends \BaseController {

	 /**
     * @var \User
     */
    protected $candidates;

    /**
     * @param \User $users
     */
    public function __construct(User $user)
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        //Initialize User modal
        $this->candidates = $user;  
    }

	/**
	 * Display a listing of the resource.
	 * GET /candidate
	 *
	 * @return Response
	 */
	public function index()
	{
		 $candidates = User::whereHas('roles' ,function($q){
                    $q->where('slug', 'candidate');
                })->paginate(10);
        $no = $candidates->getFrom();
       // $users = User::with('roles')->where('name','admin')->paginate(10);
       // print_r($users); exit;
        return View::make('candidates.index', compact('candidates','no'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /candidate/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /candidate
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /candidate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /candidate/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /candidate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /candidate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}