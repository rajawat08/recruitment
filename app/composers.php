<?php



//View::composer('users.form', 'Composers\UserFormComposer');

View::composer('users.form', function($view)
{
	 $roles = Role::lists('name', 'id');

        $view->with(compact('roles'));
   
});

View::composer(['roles.form','roles.modal'], function($view)
{
	 $permissions = Permission::lists('name', 'id');

        $view->with(compact('permissions'));
   
});

View::composer('clients.form', function($view)
{
	 $users = User::lists('name', 'id');

	 $countries = Country::lists('name', 'code');

	 $account_type = Config::get('crm.client_account_type');

	 $status = Config::get('crm.client_status');
	 
	 $revenue = array(
	 					"low" => "Low",
	 					"medium" => "Medium",
	 					"high" => "High"
	 				);
	 $industry = DB::table('industry')->lists('name', 'id');

     $view->with(compact('users','account_type','status','revenue','countries','industry'));
   
});

View::composer('contacts.form', function($view)
{
	 $departments = DB::table('client_company_departments')->lists('dpt_name','dpt_code');
	 $users = User::lists('name', 'id');

	 $countries = Country::lists('name', 'code');

	 $clients = Client::lists('account_name', 'id');
	 $gender = array(
	 					"M" => "Male",
	 					"F" => "FeMale",
	 					"NA" => "Not Applicable",
	 					"NBD" => "Not be disclosed"
	 				);
	 
	 $status = array(
	 					"active" => "Active",
	 					"in-active" => "In Active"
	 				);
	 $lead_sources = Config::get("crm.client_contact_lead_source");
	 
     $view->with(compact('users','departments','status','clients','gender','lead_sources','countries'));
   
});


// for lead form 
View::composer('leads.form', function($view)
{
	 
	 $users = User::lists('name', 'id');

	 $countries = Country::lists('name', 'code'); 

	 $gender = array(
	 					"M" => "Male",
	 					"F" => "FeMale",
	 					"NA" => "Not Applicable",
	 					"NBD" => "Not be disclosed"
	 				);
	 
	 $status = Config::get('crm.lead_status');

	 $lead_sources = Config::get("crm.lead_source");
	 
	 $account_type = Config::get('crm.client_account_type');
	 $industry = DB::table('industry')->lists('name', 'id');
	 
     $view->with(compact('users','status','gender','lead_sources','countries','account_type','industry'));
   
});

