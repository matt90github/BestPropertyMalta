<?php

use Illuminate\Database\Migrations\Migration;

class CreatePropertyTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('property_types', function($table){
			$table->increments('property_type_id');
			$table->string('property_type_name');
			$table->longText('property_type_description');
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
		Schema::drop('property_types');
	}

}