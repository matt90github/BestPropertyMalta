<?php

use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function($table){
			$table->increments('staff_id');
			$table->string('staff_title');
			$table->string('staff_firstName');
			$table->string('staff_lastName');
			$table->string('staff_emailAddress');
			$table->string('staff_username');
			$table->string('staff_password');
			$table->unsignedInteger('staff_roleId');
			$table->foreign('staff_roleId')
      			->references('staff_role_id')->on('staff_roles')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->dateTime('staff_employmentDate');
			$table->string('staff_idCardNumber');
			$table->dateTime('staff_dateOfBirth');
			$table->string('staff_addressLine1');
			$table->string('staff_addressLine2')->nullable();
			$table->unsignedInteger('staff_countryId');
			$table->foreign('staff_countryId')
			    ->references('country_id')->on('countries')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->string('staff_phoneNumber')->nullable();
			$table->string('staff_mobileNumber');
			$table->tinyInteger('staff_isActive');
			$table->tinyInteger('staff_isDeleted');
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
		Schema::drop('staff');
	}

}