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

	'client_contact_lead_source' => ['cold_call' => "Cold Call" , 'existing_customer' => 'Existing Customer', 'self_generated' => 'Self Generated' , 'employee' => 'Employee', 'partner' => 'Partner','public_relations' => 'Public Relations' ,'direct_mail' => 'Direct Mail' ,'conference' => 'Conference' , 'trade_show' => 'Trade Show' , 'website' => 'Web Site','word_of_mouth' => 'Word of mouth','other' => 'Other'],		
	


	);


?>