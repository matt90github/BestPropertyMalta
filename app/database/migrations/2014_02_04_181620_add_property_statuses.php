<?php

use Illuminate\Database\Migrations\Migration;

class AddPropertyStatuses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('property_statuses')->insert(array(
			'property_status_name'=>'For Sale',
			'property_status_description'=>'This property is currently for sale',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_statuses')->insert(array(
			'property_status_name'=>'Sold Subject to Contract',
			'property_status_description'=>'This property has been sold subject to contract',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_statuses')->insert(array(
			'property_status_name'=>'Sold',
			'property_status_description'=>'This property has been sold',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('property_statuses')->delete();
	}

}