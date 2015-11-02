<?php


class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$permissions = array(
            'Manage Users',
            'Manage Roles',
            'Manage Permissions',
            'Manage Openings',
            'Manage Settings'
            
        );

        foreach ($permissions as $permission)
        {
            Permission::create([
                'name' => $permission,
                'slug' => $permission,
                'description' => $permission,
            ]);
        }

        $permissions = Permission::lists('id');

        Role::find(1)->permissions()->attach($permissions);
	}

}