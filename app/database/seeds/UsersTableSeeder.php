<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create([
            'name' => 'Administrator',
            'username' => 'crmadmin',
            'email' => 'rajawat@crm.localhost',
            'password' => 'rajawat',
        ]);

        if ( ! $user->hasRole('admin')->first()) $user->roles()->attach(1);
	}

}