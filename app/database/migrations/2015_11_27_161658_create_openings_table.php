<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpeningsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('position_title');
			$table->string('position_level');
			$table->string('no_of_openings');
			$table->string('due_date');
			$table->string('postion_type');
			$table->string('department');
			$table->string('city');
			$table->string('state');
			$table->string('country');
			$table->string('job_skill_categories');
			$table->string('keyword_for_fz_match');
			$table->string('salary_range');
			$table->string('priority');
			$table->string('status');
			$table->string('job_description');
			$table->string('document_belongs');
			$table->integer('client_id')->unsigned()->index();
			$table->foreign('client_id')->references('id')->on("clients")->onDelete('cascade');
			$table->integer('client_contact_id')->unsigned()->nullable();
			$table->foreign('client_contact_id')->references('id')->on("contacts");			
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openings');
	}

}
