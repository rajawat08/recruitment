<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('gender');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('email');
			$table->string('mobile_phone');
			$table->string('phone');
			$table->string('skills');
			$table->string('merital_status');
			$table->string('date_of_birth');
			
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('country');
			$table->string('current_salary');
			$table->string('expt_salary');
			$table->string('notice_period');
			$table->string('notes');
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
		Schema::drop('candidates');
	}

}
