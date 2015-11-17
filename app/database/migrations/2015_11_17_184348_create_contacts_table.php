<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('gender');
			$table->string('last_name');
			$table->string('email');
			$table->string('fax');
			$table->string('work_phone');
			$table->string('mobile_phone');
			$table->string('department');
			$table->string('title');
			$table->string('reports_to');
			$table->string('assistant_name');
			$table->string('assistant_contact');
			$table->string('assistant_email');
			$table->string('address');
			$table->string('state');
			$table->string('city');
			$table->string('country');
			$table->string('lead_source');
			$table->string('twitter');
			$table->integer('client_id')->unsigned()->index();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->integer('added_by')->unsigned()->index();
			$table->foreign('added_by')->references('id')->on('users');
			$table->integer('managed_by')->unsigned()->index();
			$table->foreign('managed_by')->references('id')->on('users');			
			$table->string('linkedin');
			$table->text('notes');
			$table->tinyInteger('email_opt_out')->default(0);
			$table->tinyInteger('do_not_call')->default(0);
			$table->tinyInteger('reference')->default(0);
			$table->tinyInteger('portal_user')->default(0);
			$table->string('status');		
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
		Schema::drop('contacts');
	}

}
