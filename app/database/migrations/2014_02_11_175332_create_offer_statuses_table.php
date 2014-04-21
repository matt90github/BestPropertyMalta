<?php

use Illuminate\Database\Migrations\Migration;

class CreateOfferStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_statuses', function($table){
			$table->increments('offer_status_id');
			$table->string('offer_status_name');
			$table->longText('offer_status_description');
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
		Schema::drop('offer_statuses');
	}

}