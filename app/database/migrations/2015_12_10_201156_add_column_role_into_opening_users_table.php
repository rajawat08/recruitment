<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnRoleIntoOpeningUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('opening_users', function(Blueprint $table)
		{
			$table->integer("role_id")->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('opening_users', function(Blueprint $table)
		{
			$table->dropColumn("role_id");
		});
	}

}
