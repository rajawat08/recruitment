<?php



class IndustryTableSeeder extends Seeder {

	public function run()
	{
		$industry = array(
			'Accounting',
			'Airlines/Aviation',
			'Alternative Dispute Resolution',
			'Alternative Medicine',
			'Animation',
			'Apparel & Fashion',
			'Architecture & Planning',
			'Arts and Crafts',
			'Automotive',
			'Aviation & Aerospace',
			'Banking',
			'Biotechnology',
			'Broadcast Media',
			'Building Materials',
			'Business Supplies and Equipment',
			'Capital Markets',
			'Chemicals',
			'Civic & Social Organization',
			'Civil Engineering',
			'Commercial Real Estate',
			'Computer & Network Security',
			'Computer Games',
			'Computer Hardware',
			'Computer Networking',
			'Computer Software',
			'Construction',
			'Consumer Electronics',
			'Consumer Goods',
			'Consumer Services',
			'Cosmetics',
			'Dairy',
			'Defense & Space',
			'Design',
			'Education Management',
			'E-Learning',
			'Electrical/Electronic Manufacturing',
			'Entertainment',
			'Environmental Services',
			'Events Services',
			'Executive Office',
			'Facilities Services',
			'Farming',
			'Financial Services',
			'Fine Art',
			'Fishery',
			'Food & Beverages',
			'Food Production',
			'Fund-Raising',
			'Furniture',
			'Gambling & Casinos',
			'Glass, Ceramics & Concrete',
			'Government Administration',
			'Government Relations',
			'Graphic Design',
			'Health, Wellness and Fitness',
			'Higher Education',
			'Hospital & Health Care',
			'Hospitality',
			'Human Resources',
			'Import and Export',
			'Individual & Family Services',
			'Industrial Automation',
			'Information Services',
			'Information Technology and Services',
			'Insurance',
			'International Affairs',
			'International Trade and Development',
			'Internet',
			'Investment Banking',
			'Investment Management',
			'Judiciary',
			'Law Enforcement',
			'Law Practice',
			'Legal Services',
			'Legislative Office',
			'Leisure, Travel & Tourism',
			'Libraries',
			'Logistics and Supply Chain',
			'Luxury Goods & Jewelry',
			'Machinery',
			'Management Consulting',
			'Maritime',
			'Market Research',
			'Marketing and Advertising',
			'Mechanical or Industrial Engineering',
			'Media Production',
			'Medical Devices',
			'Medical Practice',
			'Mental Health Care',
			'Military',
			'Mining & Metals',
			'Motion Pictures and Film',
			'Museums and Institutions',
			'Music',
			'Nanotechnology',
			'Newspapers',
			'Non-Profit Organization Management',
			'Oil & Energy',
			'Online Media',
			'Outsourcing/Offshoring',
			'Package/Freight Delivery',
			'Packaging and Containers',
			'Paper & Forest Products',
			'Performing Arts',
			'Pharmaceuticals',
			'Philanthropy',
			'Photography',
			'Plastics',
			'Political Organization',
			'Primary/Secondary Education',
			'Printing',
			'Professional Training & Coaching',
			'Program Development',
			'Public Policy',
			'Public Relations and Communications',
			'Public Safety',
			'Publishing',
			'Railroad Manufacture',
			'Ranching',
			'Real Estate',
			'Recreational Facilities and Services',
			'Religious Institutions',
			'Renewables & Environment',
			'Research',
			'Restaurants',
			'Retail',
			'Security and Investigations',
			'Semiconductors',
			'Shipbuilding',
			'Sporting Goods',
			'Sports',
			'Staffing and Recruiting',
			'Supermarkets',
			'Telecommunications',
			'Textiles',
			'Think Tanks',
			'Tobacco',
			'Translation and Localization',
			'Transportation/Trucking/Railroad',
			'Utilities',
			'Venture Capital & Private Equity',
			'Veterinary',
			'Warehousing',
			'Wholesale',
			'Wine and Spirits',
			'Wireless',
			'Writing and Editing'
			);
		for($i=0; $i<count($industry);$i++)
		{
			$code = hyphenize($industry[$i]);			
			DB::table('industry')->insert(
			    array('code' => $code, 'name' => $industry[$i])
			);
		}
	}

}