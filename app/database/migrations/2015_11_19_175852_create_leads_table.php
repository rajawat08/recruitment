<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->string('first_name');
			$table->string('gender');
			$table->string('last_name');
			$table->string('email');
			$table->string('fax');
			$table->string('work_phone');
			$table->string('mobile_phone');
			$table->string('client_account_name');			
			$table->string('title');
			$table->string('website');
			$table->string('sec_email');
			$table->string('lead_source');
			$table->string('lead_source_name');
			$table->string('industry');
			$table->string('status');			
			$table->string('address');
			$table->string('state');
			$table->string('city');
			$table->string('country');			
			$table->string('twitter');
			$table->string('linkedin');
			$table->integer('added_by')->unsigned()->index();
			$table->foreign('added_by')->references('id')->on('users');
			$table->integer('managed_by')->unsigned()->index();
			$table->foreign('managed_by')->references('id')->on('users');
			$table->text('notes');
			$table->string('doc_path');		
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
		Schema::drop('leads');
	}

}
