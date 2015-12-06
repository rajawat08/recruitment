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
		$recruiters = Role::where('slug','=','recruiter')->first();
		$users = $recruiters->users; 
		$assign_users = [];
		return $this->view('openings.create',compact('users','assign_users'));
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
            Input::except('_token','doc_path','recruiters'),
            function ($val) {
                return !empty($val);
            }
        );
        

        $input['document_belongs'] = gen_uuid();
        $input['job_skill_categories'] = json_encode($input['job_skill_categories']);
        //print_r(Input::all()); exit;
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

        if(Input::has('recruiters')){
        	$recruiters = Input::get('recruiters');
        	foreach ($recruiters as $key => $value) {
        		OpeningUser::Create(array("opening_id" => $opening->id,"user_id" => $value ));
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
		$opening = $this->openings->findOrFail($id);
		$opening->job_skill_categories = json_decode($opening->job_skill_categories);
		$contact = DB::table('contacts')->where('id','=',$opening->client_contact_id)->get();
		
         return $this->view('openings.view', compact('opening','contact'));
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
		$opening = $this->openings->findOrFail($id);
		$opening->job_skill_categories = json_decode($opening->job_skill_categories);

		$recruiters = Role::where('slug','=','recruiter')->first();
		$users = $recruiters->users;

		$assign_users = OpeningUser::select('user_id')->where('opening_id',"=",$id)->get()->toArray();

		if(!empty($assign_users)){
		if(count($assign_users)>1){
			$merged = call_user_func_array('array_merge_recursive', $assign_users);
			$assign_users = $merged['user_id'];
		}else{
			$assign_users[0] = $assign_users[0]['user_id'];
		}
		}
		//print_r($assign_users); exit;
         return $this->view('openings.edit', compact('opening','users','assign_users'));
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
		//print_r(Input::all()); exit;
		$validation = Validator::make(Input::all(), Opening::$rules);
        if (!$validation->passes()) {
            return Redirect::route('openings.edit',$id)
                ->withInput()
                ->withErrors($validation)
                ->withFlashMessage("There were validation errors.")
                ->withFlashType('danger');
                
        }

        $input = array_filter(
            Input::except('_token','doc_path','recruiters'),
            function ($val) {
                return !empty($val);
            }
        );
        if(Input::has('job_skill_categories'))
        $input['job_skill_categories'] = json_encode($input['job_skill_categories']);

        $opening = $this->openings->findOrFail($id);
        
        $opening->update($input);

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

        if(Input::has('recruiters')){
        $assign_users = OpeningUser::select('user_id')->where('opening_id',"=",$id)->get()->toArray();

		//$merged = call_user_func_array('array_merge_recursive', $assign_users);
		if(!empty($assign_users)){
		if(count($assign_users)>1){
			$merged = call_user_func_array('array_merge_recursive', $assign_users);
			$assign_users = $merged['user_id'];
		}else{
			$assign_users[0] = $assign_users[0]['user_id'];
		}
		}
		$remove = array_diff($assign_users,Input::get('recruiters'));
		$addNew = array_diff(Input::get('recruiters'),$assign_users);
		// print_r($remove); 
		// print_r($addNew);
		// print_r(Input::get('recruiters'));
		// print_r($assign_users);	
        	
        	foreach ($addNew as $key => $value) {
        		OpeningUser::Create(array("opening_id" => $opening->id,"user_id" => $value ));
        	}

        	foreach ($remove as $key => $value) {
        		OpeningUser::where('opening_id' ,"=", $opening->id)->where('user_id','=',$value)->delete();
        	}

        }

        return $this->redirect('openings.index');


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