<?php

class CountryTableSeeder extends Seeder {

	public function run()
	{
		Country::create([
            'name' => 'India',
            'code' => 'IN'
        ]);

        Country::create([
            'name' => 'United States',
            'code' => 'US'
        ]);

        Country::create([
            'name' => 'Canada',
            'code' => 'CA'
        ]);

        Country::create([
            'name' => 'China',
            'code' => 'CN'
        ]);
        Country::create([
            'name' => 'Russia',
            'code' => 'RU'
        ]);
	}

}