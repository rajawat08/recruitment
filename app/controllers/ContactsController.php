<?php

class ContactsController extends \BaseController {

	protected $contacts;

	public function __construct(Contact $contacts){

		$this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        $this->contacts = $contacts;
	}
	/**
	 * Display a listing of the resource.
	 * GET /contacts
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = $this->contacts->paginate(10);
        
		
        return View::make('contacts.index', compact('contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contacts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contacts
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Contact::$rules);
        if (!$validation->passes()) {
            return Redirect::route('contacts.create')
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

        $contact = $this->contacts->create($input);

        return Redirect::route('contacts.index');
	}

	/**
	 * Display the specified resource.
	 * GET /contacts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = $this->contacts->findOrFail($id);
		
         return $this->view('contacts.view', compact('contact'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /contacts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contact = $this->contacts->findOrFail($id);

         return $this->view('contacts.edit', compact('contact'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /contacts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validation = Validator::make(Input::all(), Contact::$rules);
        if (!$validation->passes()) {
            return Redirect::route('contacts.edit',$id)
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

        if(!Input::has("email_opt_out")) $input['email_opt_out'] = 0;
        if(!Input::has("do_not_call")) $input['do_not_call'] = 0;
        if(!Input::has("reference")) $input['reference'] = 0;
        if(!Input::has("portal_user")) $input['portal_user'] = 0;

        $contact = $this->contacts->findOrFail($id);
        $contact->update($input);
        return $this->redirect("contacts.index");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /contacts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->contacts->destroy($id);

        return $this->redirect('contacts.index');
	}

}