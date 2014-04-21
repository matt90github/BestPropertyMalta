<?php

use Illuminate\Database\Migrations\Migration;

class AddStaff extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('staff')->insert(array(
			'staff_title'=>'Mr.',
			'staff_firstName'=>'Anthony',
			'staff_lastName'=>'Sacco',
			'staff_emailAddress'=>'anthsacc@gmail.com',
			'staff_username'=>'anthsacc',
			'staff_password'=>'$2y$10$X16WTK7Hf2nO4jGSdYf.GerZHziLvhIqg.VElf2/HX7YVdSkLV9jC',
			'staff_roleId'=>'1',
			'staff_employmentDate'=>'2014-02-04 00:00:00',
			'staff_idCardNumber'=>'132190M',
			'staff_dateOfBirth'=>'1978-02-04 00:00:00',
			'staff_addressLine1'=>'Test Address Test Address',
			'staff_addressLine2'=>'Test Address Test Address',
			'staff_countryId'=>'151',
			'staff_phoneNumber'=>'21447351',
			'staff_mobileNumber'=>'99297389',
			'staff_isActive'=>'1',
			'staff_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff')->insert(array(
			'staff_title'=>'Ms.',
			'staff_firstName'=>'Pauline',
			'staff_lastName'=>'Sammut',
			'staff_emailAddress'=>'pauline.sammut@gmail.com',
			'staff_username'=>'p.sammut',
			'staff_password'=>'$2y$10$alOvXpZ5Gn0G6dcK3T1kJe07ISWEYLu.zD9F7hwh1aUigSpZb0kaK',
			'staff_roleId'=>'2',
			'staff_employmentDate'=>'2010-04-14 00:00:00',
			'staff_idCardNumber'=>'099284M',
			'staff_dateOfBirth'=>'1984-07-14 00:00:00',
			'staff_addressLine1'=>'33, Fireplace, Strait Street',
			'staff_addressLine2'=>'Luqa, LQA2008',
			'staff_countryId'=>'151',
			'staff_phoneNumber'=>'21320248',
			'staff_mobileNumber'=>'99236728',
			'staff_isActive'=>'1',
			'staff_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff')->insert(array(
			'staff_title'=>'Mr.',
			'staff_firstName'=>'George',
			'staff_lastName'=>'Caruana',
			'staff_emailAddress'=>'g.caruana@gmail.com',
			'staff_username'=>'gcaruana',
			'staff_password'=>'$2y$10$pEsc4Z72CQddrvCdNiDB.us3JLVa2f42mlaHGBgTE0y/CrJpSggGu',
			'staff_roleId'=>'2',
			'staff_employmentDate'=>'2012-01-09 00:00:00',
			'staff_idCardNumber'=>'221187M',
			'staff_dateOfBirth'=>'1987-01-14 00:00:00',
			'staff_addressLine1'=>'78, Garden View, Maria Schembri Street',
			'staff_addressLine2'=>'Floriana, FLR3113',
			'staff_countryId'=>'151',
			'staff_phoneNumber'=>'27193001',
			'staff_mobileNumber'=>'79100023',
			'staff_isActive'=>'1',
			'staff_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff')->insert(array(
			'staff_title'=>'Mr.',
			'staff_firstName'=>'David',
			'staff_lastName'=>'Phyall',
			'staff_emailAddress'=>'dphyall@gmail.com',
			'staff_username'=>'dphyall89',
			'staff_password'=>'$2y$10$bBpKKdQBITVQZVQqVBOVpOrp9nxVLoJdSxzGsHMGzXMDWDvfSG4q6',
			'staff_roleId'=>'3',
			'staff_employmentDate'=>'2012-12-08 00:00:00',
			'staff_idCardNumber'=>'108489M',
			'staff_dateOfBirth'=>'1989-11-10 00:00:00',
			'staff_addressLine1'=>'50, Flower, Republic Street',
			'staff_addressLine2'=>'Rabat, RBT1334',
			'staff_countryId'=>'151',
			'staff_phoneNumber'=>'21334211',
			'staff_mobileNumber'=>'99236222',
			'staff_isActive'=>'1',
			'staff_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('staff')->insert(array(
			'staff_title'=>'Mrs.',
			'staff_firstName'=>'Doris',
			'staff_lastName'=>'Azzopardi',
			'staff_emailAddress'=>'d.azzopardi@gmail.com',
			'staff_username'=>'d.azzopardi',
			'staff_password'=>'$2y$10$o8dXbhMewD/5j.YeO4m3xuu3jk/1NG2guP2anuAaps7CowEwJS9MS',
			'staff_roleId'=>'4',
			'staff_employmentDate'=>'2014-02-01 00:00:00',
			'staff_idCardNumber'=>'132188M',
			'staff_dateOfBirth'=>'1988-02-04 00:00:00',
			'staff_addressLine1'=>'9, Courtfield, Main Road',
			'staff_addressLine2'=>'Kirkop, KRP2133',
			'staff_countryId'=>'151',
			'staff_phoneNumber'=>'27233244',
			'staff_mobileNumber'=>'99109133',
			'staff_isActive'=>'1',
			'staff_isDeleted'=>'0',
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
		DB::table('staff')->delete();
	}

}