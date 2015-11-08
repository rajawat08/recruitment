<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('account_name');
			$table->string('website');
			$table->string('phone');
			$table->string('email');
			$table->string('fax');
			$table->string('secondary_phone');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('country');
			$table->string('account_type');
			$table->string('status');
			$table->string('revenue_type');
			$table->string('industry');
			$table->string('billing_rate');
			$table->string('contract_start');
			$table->string('contract_end');
			$table->string('contract_path');
			$table->integer('added_by')->unsigned()->index();
			//$table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('added_by')->references('id')->on('users');
			$table->integer('managed_by')->unsigned()->index();
			$table->foreign('managed_by')->references('id')->on('users');
			$table->text('notes');
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
		Schema::drop('clients');
	}

}
