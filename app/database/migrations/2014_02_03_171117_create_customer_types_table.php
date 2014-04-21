<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomerTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_types', function($table){
			$table->increments('customer_type_id');
			$table->string('customer_type_name');
			$table->longText('customer_type_description');
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
		Schema::drop('customer_types');
	}

}