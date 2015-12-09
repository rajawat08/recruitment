<?php

class AjaxController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /ajax
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * add new resource as per request
	 * POST /ajax/add
	 *
	 * @return Response
	 */
	public function create()
	{
		//print_r(Input::all());
		$table  = Input::get('table');
		$data  = Input::get('data');
		if($table =='client_company_departments'){
			$code = hyphenize($data['dpt_name']);	
			$data['dpt_code'] = $code;	
			$data['user_id'] = 1;	
			DB::table($table)->insert($data);
			return Response::make(array('status' => true, 'data' =>$data));
		}

		// assign opening to candidates

		if($table == 'opening_users'){
			//print_r($data);
			$candidates = $data['candidates'];
			$opening = $data['openings'];
			for($i=0;$i<count($candidates);$i++){
				$already = OpeningUser::where("opening_id","=",$opening)->where("user_id","=",$candidates[$i])->first();
				if(is_null($already)){
					OpeningUser::create([
						'opening_id' =>$opening,
						'user_id' => $candidates[$i]
					]);
				}
				
			}
			return Response::make(array('status' => true, 'data' =>[]));
		}

	}

	/**
	 * add new resource as per request
	 * POST /ajax/read
	 *
	 * @return Response
	 */
	public function fetch()
	{
		//print_r(Input::all());
		$table  = Input::get('table');
		$data  = Input::get('data');
		
		if($table =='contacts'){			
			$data = Contact::where('id','=',$data['client'])->get();
			return Response::make(array('status' => true, 'data' =>$data));
		}

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ajax
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ajax/{id}
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
	 * GET /ajax/{id}/edit
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
	 * PUT /ajax/{id}
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
	 * DELETE /ajax/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * convert lead to Account
	 * POST /ajax/converttoclient
	 *
	 * @return Response
	 */
	public function convertToClient()
	{
		

		$data = Input::get('data');
		$leads = $data['leads'];

		for ($i=0; $i < count($leads) ; $i++) { 
			$client = [];
			$leadInfo = Lead::findOrFail($leads[$i]);
			

			$client['account_name'] = trim($leadInfo->lead_account_name) !="" ? $leadInfo->lead_account_name : $leadInfo->first_name." ".$leadInfo->last_name;
			$client['email'] = $leadInfo->email;
			$client['website'] = $leadInfo->website;
			$client['phone'] = $leadInfo->mobile_phone;
			$client['fax'] = $leadInfo->fax;
			$client['secondary_phone'] = $leadInfo->work_phone;
			$client['address'] = $leadInfo->address;
			$client['city'] = $leadInfo->city;
			$client['state'] = $leadInfo->state;
			$client['country'] = $leadInfo->country;
			$client['account_type'] = "account";
			$client['status'] = "active";
			$client['industry'] = $leadInfo->industry;
			$client['added_by'] = $leadInfo->added_by;
			$client['managed_by'] = $leadInfo->managed_by;
			$client['notes'] = $leadInfo->notes;			
			$source = "./uploads/leads/docs/".$leadInfo->doc_path;
			$destination = "./uploads/".$leadInfo->doc_path;
			if(file_exists($source)){
				if(copy($source, $destination)){
	        		unlink($source);
	        		$client['contract_path'] = $leadInfo->doc_path;
	        		
	        	}
			}
			
			Client::create($client);
			Lead::destroy($leads[$i]);
		
			
		}
		return Response::make(array('status' => true));

		
	}

}