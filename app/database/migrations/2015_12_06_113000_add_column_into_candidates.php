<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnIntoCandidates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('candidates', function(Blueprint $table)
		{
			$table->string("document_belongs");			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('candidates', function(Blueprint $table)
		{
			$table->dropColumn("document_belongs");
		});
	}

}
