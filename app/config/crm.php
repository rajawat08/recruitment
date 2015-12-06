<?php
return array(
	/*
	|--------------------------------------------------------------------------
	| Default Remote Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default connection that will be used for SSH
	| operations. This name should correspond to a connection name below
	| in the server list. Each connection will be manually accessible.
	|
	*/
	
	'client_account_type' => ['lead' => 'Lead' , 'account' => 'Account' , 'potential' => 'Potential', 'analyst' => 'Analyst', 'competitor' => 'Competitor','customer' => 'Customer', 'integrator' => 'Integrator', 'investor' => 'Investor', 'partner' => 'Partner' , 'supplier' => 'Supplier', 'press' => 'Press', 'prospect' => 'Prospect','reseller' => 'Reseller'],

	'client_contact_lead_source' => ['cold_call' => "Cold Call",'employee_referral' => 'Employee Referral','external_referral' => 'External Referral','client_referral' => 'Client Referral' , "social_networks" => "Social Networks"],

	'client_status' => ['active' => 'Active', 'inactive' => 'In Active', 'lost_account' => 'Lost Account'],

	'lead_source' => ['cold_call' => "Cold Call" , 'existing_customer' => 'Existing Customer', 'self_generated' => 'Self Generated' , 'employee' => 'Employee', 'partner' => 'Partner','public_relations' => 'Public Relations' ,'direct_mail' => 'Direct Mail' ,'conference' => 'Conference' , 'trade_show' => 'Trade Show' , 'website' => 'Web Site','word_of_mouth' => 'Word of mouth','other' => 'Other'],		
	
	'lead_status' => ['attempted_to_contact' => 'Attempted to Contact', 'contact_in_future' => 'Contact in future', 'contacted' => 'Contacted', 'junk_lead' => 'Junk Lead','lost_lead' => 'Lost Lead','not_contacted' => 'Not Contacted' , 'pre_qualified' => 'Pre Qualified' , 'qualified' => 'Qualified','warm' => 'Warm' , 'company_profile_terms_sent' => 'Company Profile & Terms Sent', 'need_to_follow_up' => 'Need to follow up', 'will_call_back_if_interested' => 'Will call back if interested'],

	'opening_position_level' => [],
	'opening_position_type' => [],
	'opening_department' => [],
	'opening_job_skills' => ["abc" => "abc", '123' => '123'],
	'opening_salary_range' => ["less than 100000" ,"100000 to 4000000" ,"400000 above"],
	'opening_status' => ['active' => 'Active','in-progress' => 'In Progress', 'close' => 'Closed'],
	'candidate_marital_status' => ['married' => 'Married' , 'un-married' => 'Un Married']

	);


?>