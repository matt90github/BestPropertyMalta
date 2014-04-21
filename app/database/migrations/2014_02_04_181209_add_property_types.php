<?php

use Illuminate\Database\Migrations\Migration;

class AddPropertyTypes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('property_types')->insert(array(
			'property_type_name'=>'Maisonette',
			'property_type_description'=>'This is a maisonette.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'Flat',
			'property_type_description'=>'This is a flat.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'Villa',
			'property_type_description'=>'This is a villa.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'Penthouse',
			'property_type_description'=>'This is a penthouse.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'House of Character',
			'property_type_description'=>'This is a house of character.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'Town House',
			'property_type_description'=>'This is a town house.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('property_types')->insert(array(
			'property_type_name'=>'Bungalow',
			'property_type_description'=>'This is a bungalow.',
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
		DB::table('property_types')->delete();
	}

}