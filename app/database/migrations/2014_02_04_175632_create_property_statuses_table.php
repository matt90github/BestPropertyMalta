<?php

use Illuminate\Database\Migrations\Migration;

class CreatePropertyStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property_statuses', function($table){
			$table->increments('property_status_id');
			$table->string('property_status_name');
			$table->longText('property_status_description');
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
		Schema::drop('property_statuses');
	}

}