<?php

use Illuminate\Database\Migrations\Migration;

class AddLocations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('locations')->insert(array('location_name'=>'Attard'));
		DB::table('locations')->insert(array('location_name'=>'Balzan'));
		DB::table('locations')->insert(array('location_name'=>'Bidnija'));
		DB::table('locations')->insert(array('location_name'=>'Birgu'));
		DB::table('locations')->insert(array('location_name'=>'Birkirkara'));
		DB::table('locations')->insert(array('location_name'=>'Birzebbuġia'));
		DB::table('locations')->insert(array('location_name'=>'Bormla'));
		DB::table('locations')->insert(array('location_name'=>'Dingli'));
		DB::table('locations')->insert(array('location_name'=>'Fgura'));
		DB::table('locations')->insert(array('location_name'=>'Fontana'));
		DB::table('locations')->insert(array('location_name'=>'Furjana'));
		DB::table('locations')->insert(array('location_name'=>'Għajnsielem'));
		DB::table('locations')->insert(array('location_name'=>'Għarb'));
		DB::table('locations')->insert(array('location_name'=>'Għargħur'));
		DB::table('locations')->insert(array('location_name'=>'Għasri'));
		DB::table('locations')->insert(array('location_name'=>'Għaxaq'));
		DB::table('locations')->insert(array('location_name'=>'Gudja'));
		DB::table('locations')->insert(array('location_name'=>'Gżira'));
		DB::table('locations')->insert(array('location_name'=>'Ħamrun'));
		DB::table('locations')->insert(array('location_name'=>'Iklin'));
		DB::table('locations')->insert(array('location_name'=>'Kalkara'));
		DB::table('locations')->insert(array('location_name'=>'Kerċem'));
		DB::table('locations')->insert(array('location_name'=>'Kirkop'));
		DB::table('locations')->insert(array('location_name'=>'Lija'));
		DB::table('locations')->insert(array('location_name'=>'Luqa'));
		DB::table('locations')->insert(array('location_name'=>'Marsa'));
		DB::table('locations')->insert(array('location_name'=>'Marsalforn'));
		DB::table('locations')->insert(array('location_name'=>'Marsaskala'));
		DB::table('locations')->insert(array('location_name'=>'Marsaxlokk'));
		DB::table('locations')->insert(array('location_name'=>'Mdina'));
		DB::table('locations')->insert(array('location_name'=>'Mellieħa'));
		DB::table('locations')->insert(array('location_name'=>'Mġarr'));
		DB::table('locations')->insert(array('location_name'=>'Mosta'));
		DB::table('locations')->insert(array('location_name'=>'Mqabba'));
		DB::table('locations')->insert(array('location_name'=>'Msida'));
		DB::table('locations')->insert(array('location_name'=>'Mtarfa'));
		DB::table('locations')->insert(array('location_name'=>'Munxar'));
		DB::table('locations')->insert(array('location_name'=>'Nadur'));
		DB::table('locations')->insert(array('location_name'=>'Naxxar'));
		DB::table('locations')->insert(array('location_name'=>'Paola'));
		DB::table('locations')->insert(array('location_name'=>'Pembroke'));
		DB::table('locations')->insert(array('location_name'=>'Pieta'));
		DB::table('locations')->insert(array('location_name'=>'Qala'));
		DB::table('locations')->insert(array('location_name'=>'Qormi'));
		DB::table('locations')->insert(array('location_name'=>'Qrendi'));
		DB::table('locations')->insert(array('location_name'=>'Rabat, Gozo'));
		DB::table('locations')->insert(array('location_name'=>'Rabat, Malta'));
		DB::table('locations')->insert(array('location_name'=>'Safi'));
		DB::table('locations')->insert(array('location_name'=>'San Ġwann'));
		DB::table('locations')->insert(array('location_name'=>'Santa Luċija'));
		DB::table('locations')->insert(array('location_name'=>'Santa Venera'));
		DB::table('locations')->insert(array('location_name'=>'Senglea'));
		DB::table('locations')->insert(array('location_name'=>'Siġġiewi'));
		DB::table('locations')->insert(array('location_name'=>'Sliema'));
		DB::table('locations')->insert(array('location_name'=>'San Ġiljan'));
		DB::table('locations')->insert(array('location_name'=>'San Lawrenz'));
		DB::table('locations')->insert(array('location_name'=>'San Pawl il-Baħar'));
		DB::table('locations')->insert(array('location_name'=>'Sannat'));
		DB::table('locations')->insert(array('location_name'=>'Swieqi'));
		DB::table('locations')->insert(array('location_name'=>'Tarxien'));
		DB::table('locations')->insert(array('location_name'=>'Ta Xbiex'));
		DB::table('locations')->insert(array('location_name'=>'Valletta'));
		DB::table('locations')->insert(array('location_name'=>'Xgħajra'));
		DB::table('locations')->insert(array('location_name'=>'Xagħra'));
		DB::table('locations')->insert(array('location_name'=>'Xewkija'));		
		DB::table('locations')->insert(array('location_name'=>'Xlendi'));
		DB::table('locations')->insert(array('location_name'=>'Żabbar'));
		DB::table('locations')->insert(array('location_name'=>'Żebbuġ, Gozo'));
		DB::table('locations')->insert(array('location_name'=>'Żebbuġ, Malta'));
		DB::table('locations')->insert(array('location_name'=>'Żejtun'));
		DB::table('locations')->insert(array('location_name'=>'Żurrieq'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('locations')->delete();
	}

}