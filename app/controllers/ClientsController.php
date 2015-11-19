<?php

class ClientsController extends \BaseController {

	protected $clients;

	public static $filePath = "./uploads";

	public static $fullPath = "http://manageamazon.com/CRM/uploads";


	public function __construct(Client $clients){

		$this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        $this->clients = $clients;
	}

	public function gen_uuid() {
	    return strtoupper(sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        // 32 bits for "time_low"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

	        // 16 bits for "time_mid"
	        mt_rand( 0, 0xffff ),

	        // 16 bits for "time_hi_and_version",
	        // four most significant bits holds version number 4
	        mt_rand( 0, 0x0fff ) | 0x4000,

	        // 16 bits, 8 bits for "clk_seq_hi_res",
	        // 8 bits for "clk_seq_low",
	        // two most significant bits holds zero and one for variant DCE1.1
	        mt_rand( 0, 0x3fff ) | 0x8000,

	        // 48 bits for "node"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	    ));
	}
	/**
	 * Display a listing of the resource.
	 * GET /clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = $this->clients->paginate(10);
        
		$fullPath = self::$fullPath;

		$industry = DB::table('industry')->lists('name','id');
		//print_r($industry); exit;
        return View::make('clients.index', compact('clients','fullPath','industry'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /clients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /clients
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validation = Validator::make(Input::all(), Client::$rules);
        if (!$validation->passes()) {
            return Redirect::route('clients.create')
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

        if(Input::hasFile('contract_path')){
        	$file = Input::file('contract_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = $this->gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$input['contract_path'] = $fileName;
        	}
        	
        }

        $client = $this->clients->create($input);

        return Redirect::route('clients.index');



	}

	/**
	 * Display the specified resource.
	 * GET /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /clients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->clients->findOrFail($id);

         return $this->view('clients.edit', compact('client'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validation = Validator::make(Input::all(), Client::$rules);
        if (!$validation->passes()) {
            return Redirect::route('clients.edit',$id)
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
        $client = $this->clients->findOrFail($id);
      
        if(Input::hasFile('contract_path')){
        	$file = Input::file('contract_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = $this->gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		
        		if($client->contract_path != "")
        		unlink(self::$filePath."/".$client->contract_path);

        		$input['contract_path'] = $fileName;
        	}
        	
        }



        $client->update($input);

        return $this->redirect('clients.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->clients->destroy($id);

        return $this->redirect('clients.index');
	}

}