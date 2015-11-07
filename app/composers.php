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


