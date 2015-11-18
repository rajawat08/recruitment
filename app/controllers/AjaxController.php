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
		//
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

}