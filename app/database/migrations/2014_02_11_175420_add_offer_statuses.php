<?php

use Illuminate\Database\Migrations\Migration;

class AddOfferStatuses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('offer_statuses')->insert(array(
			'offer_status_name'=>'Awaiting Approval',
			'offer_status_description'=>'This offer is currently awaiting approval',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('offer_statuses')->insert(array(
			'offer_status_name'=>'Accepted',
			'offer_status_description'=>'This offer has been accepted by the vendor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('offer_statuses')->insert(array(
			'offer_status_name'=>'Confirmed',
			'offer_status_description'=>'This offer has been confirmed by the buyer',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('offer_statuses')->insert(array(
			'offer_status_name'=>'Rejected',
			'offer_status_description'=>'This offer has been rejected by the vendor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('offer_statuses')->insert(array(
			'offer_status_name'=>'Cancelled',
			'offer_status_description'=>'This offer has been cancelled by the buyer',
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
		DB::table('offer_statuses')->delete();
	}

}