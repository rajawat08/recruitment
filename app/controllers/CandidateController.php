<?php

class CandidateController extends \BaseController {

	 /**
     * @var \User
     */
    protected $candidates;

    public static $filePath = "./uploads/candidates";

	public static $fullPath = "http://manageamazon.com/CRM/uploads";

    /**
     * @param \User $users
     */
    public function __construct(Candidate $candidate)
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
        //Initialize User modal
        $this->candidates = $candidate;  
    }

	/**
	 * Display a listing of the resource.
	 * GET /candidate
	 *
	 * @return Response
	 */
	public function index()
	{
		$candidates = User::with("candidates")->whereHas('roles' ,function($q){
                    $q->where('slug', 'candidate');
                })->paginate(10);
       $no = $candidates->getFrom();
       // $users = User::with('roles')->where('name','admin')->paginate(10);
       // print_r($candidates); exit;
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
		return $this->view('candidates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /candidate
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Candidate::$rules);
        if (!$validation->passes()) {
            return Redirect::route('candidates.create')
                ->withInput()
                ->withErrors($validation)
                ->withFlashMessage("There were validation errors.")
                ->withFlashType('danger');
                
        }

        $input = array_filter(
            Input::except('_token','password','doc_path'),
            function ($val) {
                return !empty($val);
            }
        );
        $username  = explode("@",$input['email']);
        $user_data = array(
        				"email" => $input['email'],
        				"password" => Input::get('password'),
        				"name" => $input['first_name']." ".$input['last_name'],
        				"username" => $username[0]
        			);
        

        $user = User::create($user_data);
        $user->addRole(2);
        $input['user_id'] = $user->id;

        if(Input::has('skills')){
        	$input['skills'] = json_encode($input['skills']);
        }
        $input['document_belongs'] = gen_uuid();
        $candidate = $this->candidates->create($input);

        if(Input::hasFile('doc_path')){
        	$document = array();
        	$file = Input::file('doc_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$document['doc_path'] = $fileName;
        		$document['document_belongs'] = $candidate->document_belongs;
        		Document::create($document);
        	}        	
        }

        return Redirect::route('candidates.index');


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
		 $candidate = $this->candidates->where('user_id','=',$id)->first();
		 $candidate->skills = json_decode($candidate->skills);
		 //print_r($candidate); exit;

        // $role = $candidate->getRole() ? $candidate->getRole()->id : null;

         return View::make('candidates.view', compact('candidate'));
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
		 $candidate = $this->candidates->where('user_id','=',$id)->first();
		 $candidate->skills = json_decode($candidate->skills);
		 //print_r($candidate); exit;

        // $role = $candidate->getRole() ? $candidate->getRole()->id : null;

         return View::make('candidates.edit', compact('candidate'));
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
		Candidate::$rules =  [                   
                    'email' => 'required|email|unique:users,email,' . $id
                    
                ];
        if(Input::has('password')){
               Candidate::$rules['password'] ='required|min:6|max:20'; 
        }
        //print_r(Candidate::$rules); exit;
		$validation = Validator::make(Input::all(), Candidate::$rules);
        if (!$validation->passes()) {
            return Redirect::route('candidates.edit',$id)
                ->withInput()
                ->withErrors($validation)
                ->withFlashMessage("There were validation errors.")
                ->withFlashType('danger');
                
        }

        $input = array_filter(
            Input::except('_token','password','candidate_id','doc_path'),
            function ($val) {
                return !empty($val);
            }
        );

        $username  = explode("@",$input['email']);
        $user_data = array(
        				"email" => $input['email'],        				
        				"name" => $input['first_name']." ".$input['last_name'],
        				"username" => $username[0]
        			);
        
        if(Input::has("password")){
        	$user_data["password"]  = Input::get('password');
        }
        $user = User::findOrFail($id);
        $user->update($user_data);
        
        $candidate_id = Input::get('candidate_id');
        
        if(Input::has('skills')){
        	$input['skills'] = json_encode($input['skills']);
        }else{
        	$input['skills'] = "";
        }

        $candidate = $this->candidates->where('id','=',$candidate_id)->first();
        //print_r($candidate); exit;
        $candidate->update($input);
        $candidate->document_belongs = $candidate->document_belongs == '' ? gen_uuid() : $candidate->document_belongs;
        if(Input::hasFile('doc_path')){
        	$document = array();
        	$file = Input::file('doc_path');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$document['doc_path'] = $fileName;
        		$document['document_belongs'] = $candidate->document_belongs;
        		Document::create($document);
        	}
        	
        }

        return Redirect::route('candidates.index');
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
		User::destroy($id);
		
        return Redirect::route('candidates.index');
	}

}