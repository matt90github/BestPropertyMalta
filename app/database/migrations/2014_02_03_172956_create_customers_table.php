<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function($table){
			$table->increments('customer_id');
			$table->string('customer_title');
			$table->string('customer_firstName');
			$table->string('customer_lastName');
			$table->string('customer_emailAddress');
			$table->string('customer_username');
			$table->string('customer_password');
			$table->string('customer_type');
			$table->string('customer_idCardNumber');
			$table->dateTime('customer_dateOfBirth');
			$table->string('customer_addressLine1');
			$table->string('customer_addressLine2')->nullable();
			$table->unsignedInteger('customer_countryId');
			$table->foreign('customer_countryId')
			    ->references('country_id')->on('countries')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->string('customer_phoneNumber')->nullable();
			$table->string('customer_mobileNumber');
			$table->tinyInteger('customer_isActive');
			$table->tinyInteger('customer_isDeleted');
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
		Schema::drop('customers');
	}

}