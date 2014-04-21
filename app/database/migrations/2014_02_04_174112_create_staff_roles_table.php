<?php

use Illuminate\Database\Migrations\Migration;

class CreateStaffRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff_roles', function($table){
			$table->increments('staff_role_id');
			$table->string('staff_role_name');
			$table->longText('staff_role_description');
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
		Schema::drop('staff_roles');
	}

}