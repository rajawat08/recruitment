<?php

class OpeningsController extends \BaseController {


	protected $openings;

	public static $filePath = "./uploads/openings";

	public static $fullPath = "http://manageamazon.com/CRM/uploads";


	public function __construct(Opening $openings){

		$this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        $this->openings = $openings;
	}


	/**
	 * Display a listing of the resource.
	 * GET /openings
	 *
	 * @return Response
	 */
	public function index()
	{
		$openings = $this->openings->paginate(10);
        
		$fullPath = self::$fullPath;

        return View::make('openings.index', compact('openings','fullPath'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /openings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('openings.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /openings
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Opening::$rules);
        if (!$validation->passes()) {
            return Redirect::route('openings.create')
                ->withInput()
                ->withErrors($validation)
                ->withFlashMessage("There were validation errors.")
                ->withFlashType('danger');
                
        }

        $input = array_filter(
            Input::except('_token','doc_path'),
            function ($val) {
                return !empty($val);
            }
        );
        

        $input['document_belongs'] = gen_uuid();

        //print_r($input);
        $opening = $this->openings->create($input);
        

        if(Input::hasFile('doc_path')){
        	$document = array();
        	$file = Input::file('doc_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$document['doc_path'] = $fileName;
        		$document['document_belongs'] = $opening->document_belongs;
        		Document::create($document);
        	}
        	
        }

        return Redirect::route('openings.index');

	}

	/**
	 * Display the specified resource.
	 * GET /openings/{id}
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
	 * GET /openings/{id}/edit
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
	 * PUT /openings/{id}
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
	 * DELETE /openings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->openings->destroy($id);

        return $this->redirect('openings.index');
	}

}