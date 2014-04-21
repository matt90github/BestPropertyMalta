<?php

use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function($table){
			$table->increments('property_id');
			$table->unsignedInteger('property_typeId');
			$table->foreign('property_typeId')
      			->references('property_type_id')->on('property_types')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->unsignedInteger('property_statusId');
			$table->foreign('property_statusId')
      			->references('property_status_id')->on('property_statuses')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->unsignedInteger('property_vendorId');
			$table->foreign('property_vendorId')
      			->references('customer_id')->on('customers')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->string('property_name');
			$table->longText('property_description');
			$table->unsignedInteger('property_locationId');
			$table->foreign('property_locationId')
      			->references('location_id')->on('locations')
      			->onDelete('cascade')
      			->onUpdate('cascade');
			$table->float('property_squareMetres');
			$table->integer('property_bathrooms');
			$table->integer('property_bedrooms');
			$table->tinyInteger('property_hasGarage');
			$table->tinyInteger('property_hasGarden');
			$table->decimal('property_price', 10, 2);
			$table->tinyInteger('property_isActive');
			$table->tinyInteger('property_isDeleted');
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
		Schema::drop('properties');
	}

}