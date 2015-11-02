<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
            'name' => 'Administrator',
            'slug' => 'admin'
        ]);

        Role::create([
            'name' => 'Candidate',
            'slug' => 'candidate'
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user'
        ]);
	}

}