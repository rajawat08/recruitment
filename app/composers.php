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

	 $account_type = array(
	 					"lead" => "Lead"
	 				);
	 $status = array(
	 					"active" => "Active",
	 					"in-active" => "In Active"
	 				);
	 
	 $revenue = array(
	 					"low" => "Low",
	 					"medium" => "Medium",
	 					"high" => "High"
	 				);
	 $industry = array(
	 					"banking" => "Banking",
	 					"insurance" => "Insurance",
	 					"it-industry" => "IT Industry"
	 				);
        $view->with(compact('users','account_type','status','revenue','countries','industry'));
   
});

View::composer('contacts.form', function($view)
{
	 $departments = array(
	 					"sales" => "Sales"
	 				);
	 $users = User::lists('name', 'id');

	 $countries = Country::lists('name', 'code');

	 $clients = Client::lists('account_name', 'id');
	 $gender = array(
	 					"M" => "Male",
	 					"F" => "FeMale"
	 				);
	 
	 $status = array(
	 					"active" => "Active",
	 					"in-active" => "In Active"
	 				);
	 $lead_sources = array(
	 					"source 1" => "Source 1"
	 					
	 				);
	 
        $view->with(compact('users','departments','status','clients','gender','lead_sources','countries'));
   
});


