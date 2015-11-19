<?php

class LeadsController extends \BaseController {

	protected $leads;

	public static $filePath = "./uploads/leads/docs";

	public static $fullPath = "http://manageamazon.com/CRM/uploads/leads/docs";


	public function __construct(Lead $leads){

		$this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        $this->leads = $leads;
	}

	/**
	 * Display a listing of the resource.
	 * GET /leads
	 *
	 * @return Response
	 */
	public function index()
	{
		$leads = $this->leads->paginate(10);
        
		$fullPath = self::$fullPath;
        return View::make('leads.index', compact('leads','fullPath'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /leads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view("leads.create");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /leads
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Lead::$rules);
        if (!$validation->passes()) {
            return Redirect::route('leads.create')
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

        if(Input::hasFile('doc_path')){
        	$file = Input::file('doc_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$input['doc_path'] = $fileName;
        	}
        	
        }

        $leads = $this->leads->create($input);
        return Redirect::route('leads.index');
	}

	/**
	 * Display the specified resource.
	 * GET /leads/{id}
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
	 * GET /leads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lead = $this->leads->findOrFail($id);

         return $this->view('leads.edit', compact('lead'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /leads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validation = Validator::make(Input::all(), lead::$rules);
        if (!$validation->passes()) {
            return Redirect::route('leads.edit',$id)
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
        $lead = $this->leads->findOrFail($id);
      
        if(Input::hasFile('doc_path')){
        	$file = Input::file('doc_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		
        		if($lead->doc_path != "")
        		unlink(self::$filePath."/".$lead->doc_path);

        		$input['doc_path'] = $fileName;
        	}
        	
        }



        $lead->update($input);

        return $this->redirect('leads.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /leads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->leads->destroy($id);

        return $this->redirect('leads.index');
	}

}