<?php

class SiteController extends \BaseController {

	public static $filePath = "./uploads/emails";

	public static $fullPath = "http://manageamazon.com/CRM/uploads";

	/**
     * @param
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        // Authentication filter      
        $this->beforeFilter('auth');
       
    }

    /**
     * Redirect not found.
     *
     * @return Response
     */
    protected function redirectNotFound()
    {
        return Redirect::route('candidates.index');
    }

	/**
	 * Display a listing of the resource.
	 * GET /site
	 *
	 * @return Response
	 */
	public function getToClient($id)
	{
		
		$candidate =Candidate::find($id);
        if(is_null($candidate) || count($candidate->openings) == 0){
        	return $this->redirectNotFound();
        }
        //print_r($candidate->openings);
        $to = array();
        foreach ($candidate->openings as $opening) {
        	$email = $opening->opening->client->email;
        	if(!in_array($email, $to))
        	$to[$email] = $email;
        }        
        $cc = Client::lists('email','email');
        //$cc = call_user_func_array('array_merge_recursive', $cc);

        //print_r($to);
        //print_r($cc);
       // exit;
		
		//echo count($candidate->openings);
		return View::make('candidates.email',compact('cc','to','id'));
	}

	
	public function postToClient()
	{
		//print_r(Input::all());
		$id = Input::get("candidate_id");
		$candidate =Candidate::find($id);
        if(is_null($candidate) || count($candidate->openings) == 0){
        	return $this->redirectNotFound();
        }
        $to = Input::get('to');
        $cc = Input::get('cc');
        $subject = Input::get('subject');
        $addtional_msg = Input::get('message');
        //print_r($candidate);
		//return View::make("emails.candidate",compact("candidate"));
		//echo $subject;
		// /exit;
		$data =  array('subject'=>$subject,'to' =>$to,'addtional_msg' => $addtional_msg,'candidate' => $candidate,'cc' => $cc);
		//print_r(Input::all());
		
		if(Input::hasFile('attachments')){
			
        	$document = array();
        	$file = Input::file('attachments');
        	$ext = $file->getClientOriginalExtension();        	
        	$fileName = gen_uuid().".".$ext;        	
        	if($file->move(self::$filePath, $fileName)){
        		$data["attachment"] = self::$fullPath."/emails/".$fileName;
        	}        	
        }
		
		Mail::send('emails.candidate',$data, function($message) use($data){	
			if(isset($data["attachment"]) && file_exists($data["attachment"])){
				$message->attach($data["attachment"]);
			}
			
        $message->to($data['to'])->subject($data['subject'])->cc($data['cc']);
    	});

    	return Redirect::route('candidates.index')
                ->withFlashMessage("Candidate Profile send successfully.")
                ->withFlashType('success');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /site
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /site/{id}
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
	 * GET /site/{id}/edit
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
	 * PUT /site/{id}
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
	 * DELETE /site/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}