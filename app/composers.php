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

View::composer(['clients.form','clients.view'], function($view)
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

View::composer(['contacts.form','contacts.view'], function($view)
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
View::composer(['leads.form','leads.view'], function($view)
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

// for openings
View::composer(['openings.form','openings.view'], function($view)
{
	 $department = DB::table('client_company_departments')->lists('dpt_name','dpt_code');
	 $clients = array("select client")+Client::lists('account_name', 'id');


	 $countries = Country::lists('name', 'code'); 

	 $position_type =DB::table('position_types')->lists('name','id');
	 $position_level =DB::table('position_levels')->lists('pos_level','id');
	 // $department =Config::get('crm.opening_department');	 
	 $status = Config::get('crm.opening_status');
	 
	 $salary_range = Config::get('crm.opening_salary_range');
	 
	 $job_skills = Config::get('crm.opening_job_skills');
     $view->with(compact('clients','status','position_type','position_level','countries','department','salary_range','job_skills'));
   
});

// for openings
View::composer(['candidates.form','candidates.view','candidates.index'], function($view)
{
	 
	

	 $countries = Country::lists('name', 'code'); 

	 $marital_status =Config::get('crm.candidate_marital_status');
	 
	
	 $status = Config::get('crm.opening_status');

	 $roles = Role::lists('name', 'id');
	 
	 $job_skills = Config::get('crm.opening_job_skills');

	 $gender = array(
	 					"M" => "Male",
	 					"F" => "FeMale",
	 					"NA" => "Not Applicable",
	 					"NBD" => "Not be disclosed"
	 				);
     $view->with(compact('gender','status','roles','countries','marital_status','job_skills'));
   
});

