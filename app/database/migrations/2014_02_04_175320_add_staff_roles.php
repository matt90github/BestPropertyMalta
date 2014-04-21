<?php

use Illuminate\Database\Migrations\Migration;

class AddStaffRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('staff_roles')->insert(array(
			'staff_role_name'=>'Administrator',
			'staff_role_description'=>'This is an administrator.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff_roles')->insert(array(
			'staff_role_name'=>'Estate Agent',
			'staff_role_description'=>'This is an estate agent.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff_roles')->insert(array(
			'staff_role_name'=>'Content Editor',
			'staff_role_description'=>'This is a content editor.',
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
		DB::table('staff_roles')->delete();
	}

}