<?php

use Illuminate\Database\Migrations\Migration;

class AddCustomers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('customers')->insert(array(
			'customer_title'=>'Mr.',
			'customer_firstName'=>'Matthew',
			'customer_lastName'=>'Sacco',
			'customer_emailAddress'=>'mattsacc1990@gmail.com',
			'customer_username'=>'mattsacc1990',
			'customer_password'=>'$2y$10$jKMdYTqq4dtb.Pw4U1.szOoIMsvU9TNBdiAPF.nT18m8DuMTSHd6i',
			'customer_type'=>'Vendor',
			'customer_idCardNumber'=>'132187M',
			'customer_dateOfBirth'=>'1987-02-04 00:00:00',
			'customer_addressLine1'=>'40, Blossoms, Agnese Schembri Street',
			'customer_addressLine2'=>'Ta Paris, Birkirkara, BKR4070',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21447351',
			'customer_mobileNumber'=>'99297389',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Ms.',
			'customer_firstName'=>'Maria',
			'customer_lastName'=>'Vella',
			'customer_emailAddress'=>'marvella@marvella.com',
			'customer_username'=>'marvella',
			'customer_password'=>'$2y$10$HjJk3EzgoaBSwkS2lQS4HeYekiUV23b4ZrXpEYKvnQ/H2G7yrc4Qe',
			'customer_type'=>'Vendor',
			'customer_idCardNumber'=>'234583M',
			'customer_dateOfBirth'=>'1983-10-14 00:00:00',
			'customer_addressLine1'=>'12, Charity, Main Road',
			'customer_addressLine2'=>'Fgura FGR1289',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21678776',
			'customer_mobileNumber'=>'79120976',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Ms.',
			'customer_firstName'=>'Daniela',
			'customer_lastName'=>'Sacco',
			'customer_emailAddress'=>'danisac18@gmail.com',
			'customer_username'=>'danisac18',
			'customer_password'=>'$2y$10$mUHJW3bTWq7hBS2tyBMcPeWhfGl3QFSdgV/dghmbgDzGjK3FpaIQu',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'132190M',
			'customer_dateOfBirth'=>'1990-01-01 00:00:00',
			'customer_addressLine1'=>'34, Home Sweet Home, Independence Avenue',
			'customer_addressLine2'=>'Mosta, MST1242',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21882763',
			'customer_mobileNumber'=>'99876711',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Ms.',
			'customer_firstName'=>'Lilian',
			'customer_lastName'=>'Sacco',
			'customer_emailAddress'=>'lilian.sacco@gmail.com',
			'customer_username'=>'lilsacco',
			'customer_password'=>'$2y$10$gaz4YMNleuH0f6MAGct.M.SKN5N/9I3c0t.yPS8qOLRPcRbUD.kb2',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'876786M',
			'customer_dateOfBirth'=>'1986-12-08 00:00:00',
			'customer_addressLine1'=>'11, Hope, Valley Road',
			'customer_addressLine2'=>'Birkirkara, BKR3000',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21434498',
			'customer_mobileNumber'=>'79864360',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mr.',
			'customer_firstName'=>'Mario',
			'customer_lastName'=>'Cauchi',
			'customer_emailAddress'=>'m.cauchi@gmail.com',
			'customer_username'=>'marcauchi',
			'customer_password'=>'$2y$10$IeuFgAKGANRo9EodKX0rIumzmRQ3Ff6Ujzu7bJkHiK0UupPZ4sOPS',
			'customer_type'=>'Vendor',
			'customer_idCardNumber'=>'234367M',
			'customer_dateOfBirth'=>'1967-06-16 00:00:00',
			'customer_addressLine1'=>'26, Ocean View, Side Street',
			'customer_addressLine2'=>'Mellieha, MLH1223',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21873367',
			'customer_mobileNumber'=>'79267399',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Dr.',
			'customer_firstName'=>'Richard',
			'customer_lastName'=>'Attard',
			'customer_emailAddress'=>'richard.attard@gmail.com',
			'customer_username'=>'richattard',
			'customer_password'=>'$2y$10$QCn9IrZR47lrhKQhLF.F4e8x4sZlbuLFI417.PDnapUntYK48KYVa',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'665887M',
			'customer_dateOfBirth'=>'1987-09-09 00:00:00',
			'customer_addressLine1'=>'9, Peace, Naxxar Road',
			'customer_addressLine2'=>'Msida, MSD2309',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'27665872',
			'customer_mobileNumber'=>'79662087',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mr.',
			'customer_firstName'=>'Horace',
			'customer_lastName'=>'Azzopardi',
			'customer_emailAddress'=>'horace.azzopardi@ymail.com',
			'customer_username'=>'h.azzopardi',
			'customer_password'=>'$2y$10$9qk5Sh2y0RWMhE9o5a3dKuLk2pT8qRlX/dxgSmobSVNNPJzNpNjoC',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'833990M',
			'customer_dateOfBirth'=>'1990-07-10 00:00:00',
			'customer_addressLine1'=>'4, Ivy Cottage, Main Street',
			'customer_addressLine2'=>'Paola, PLA6627',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'27213499',
			'customer_mobileNumber'=>'99318933',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mrs.',
			'customer_firstName'=>'Helga',
			'customer_lastName'=>'Aquilina',
			'customer_emailAddress'=>'helga.aquilina@gmail.com',
			'customer_username'=>'haquilina',
			'customer_password'=>'$2y$10$V6XIbW.GI3nx8imxQgXj9eNZ4SOyixFew6xn3Goz9XH4yvGRd.yKS',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'327786M',
			'customer_dateOfBirth'=>'1986-10-08 00:00:00',
			'customer_addressLine1'=>'39, Esperanto, Labour Avenue',
			'customer_addressLine2'=>'Naxxar, NXR2000',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21442201',
			'customer_mobileNumber'=>'79322134',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mr.',
			'customer_firstName'=>'Benjamin',
			'customer_lastName'=>'Darmanin',
			'customer_emailAddress'=>'b.darmanin@gmail.com',
			'customer_username'=>'bdarmanin',
			'customer_password'=>'$2y$10$xhHmoXR7LC.3GMf7cbLBE.WPKGOCYd0vpILugscXvrh1jYdyhIxNy',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'322458M',
			'customer_dateOfBirth'=>'1958-06-03 00:00:00',
			'customer_addressLine1'=>'55, Greenfields, Great Siege Road',
			'customer_addressLine2'=>'Valletta, VLT3012',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21230199',
			'customer_mobileNumber'=>'79364447',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mrs.',
			'customer_firstName'=>'Grace',
			'customer_lastName'=>'Cachia',
			'customer_emailAddress'=>'grace.cachia@hotmail.com',
			'customer_username'=>'gracecachia',
			'customer_password'=>'$2y$10$9SiK1wVjmyqr9tz9lEBljO.J6Tr1mupywjienkqXU9q.riXORBjDu',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'422182M',
			'customer_dateOfBirth'=>'1982-12-12 00:00:00',
			'customer_addressLine1'=>'3, Southfields, Mill Street',
			'customer_addressLine2'=>'Qormi, QRM2311',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'21983822',
			'customer_mobileNumber'=>'99223113',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('customers')->insert(array(
			'customer_title'=>'Mr.',
			'customer_firstName'=>'Kenneth',
			'customer_lastName'=>'Galea',
			'customer_emailAddress'=>'kenneth.galea@gmail.com',
			'customer_username'=>'kenneth.galea',
			'customer_password'=>'$2y$10$PJmExxbDxJnvQ6Rm00PF1unTxYO/kFtJJ7CayFpjlRjsbTYIjrz5y',
			'customer_type'=>'Buyer',
			'customer_idCardNumber'=>'831890M',
			'customer_dateOfBirth'=>'1990-05-10 00:00:00',
			'customer_addressLine1'=>'1, Welcome, Balzan Valley',
			'customer_addressLine2'=>'Balzan, BLZ2100',
			'customer_countryId'=>'151',
			'customer_phoneNumber'=>'27312758',
			'customer_mobileNumber'=>'79231003',
			'customer_isActive'=>'1',
			'customer_isDeleted'=>'0',
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
		DB::table('customers')->delete();
	}

}