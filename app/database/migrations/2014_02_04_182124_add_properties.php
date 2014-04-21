<?php

use Illuminate\Database\Migrations\Migration;

class AddProperties extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('properties')->insert(array(
			'property_typeId'=>'1',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'The Cottage',
			'property_description'=>'Located in the most sought after area of Fontana, this ground floor maisonette comprises naturally bright living/dining, separate kitchen, 2 double and one single bedrooms, main bathroom, en-suite and internal yard. A/Cs are installed, optional garage.',
			'property_locationId'=>'10',
			'property_squareMetres'=>'75.8',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'350000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'2',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'Mill House',
			'property_description'=>'Highly finished bright three bedroom maisonette forming part of a smart block. Located in a peaceful area, measuring approx 160sqm. Consists of an entrance hall, a combined sitting / dining room, kitchen area,leading to a good sized balcony where one can relax and enjoy tranquility, 3 double bedrooms, 2 bathrooms, one of which is ensuite, box room and laundry room. No parking problem. Worth viewing!',
			'property_locationId'=>'7',
			'property_squareMetres'=>'160',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'0',
			'property_price'=>'920000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'3',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Treetops',
			'property_description'=>'Large 2 bedroomed villa situated infront of a valley in the heart of Ghajnsielem. Comprises of a large terrace enjoying side sea views leading onto the kitchen/living/dining, 2 bedrooms, 2 bathrooms and an extra room.',
			'property_locationId'=>'12',
			'property_squareMetres'=>'100.2',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'2',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'209000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'4',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'Hillcrest',
			'property_description'=>'Country views, 3 bedroomed penthouse, combined kitchen / dining, bathroom and a good size back terrace. Worth Viewing.',
			'property_locationId'=>'20',
			'property_squareMetres'=>'95.08',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'520000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'5',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'Sunnyside',
			'property_description'=>'Located in one of the most desirable areas of Birgu, this is a 3 bedroom luxury finished house of character in a small block . Accommodation comprises an entrance hall, spacious open plan kitchen/living/dining leading to a good size terrace, 2 bathrooms (1 en-suite shower) laundry room, box room/storage and back yard. Optional interconnecting underlying garages available.',
			'property_locationId'=>'4',
			'property_squareMetres'=>'85.5',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'634000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'6',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Woodside',
			'property_description'=>'Very nicely converted town house with old features such as xorok, kileb and wooden beams.It comprises three bedrooms, 2 bathrooms, living, study, laundry room, internal and central courtyard, kitchen/dinning, and a cellar.',
			'property_locationId'=>'20',
			'property_squareMetres'=>'112.3',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'340000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'7',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'Primrose',
			'property_description'=>'Second floor brand new bungalow measuring 98 square mtrs being sold semi-finished comprising kitchen/living/dining, 3 bedrooms, 2 bathrooms, utility room and a 2 balconies. Optional car garage.',
			'property_locationId'=>'1',
			'property_squareMetres'=>'98',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'840000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'1',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'Blossoms',
			'property_description'=>'3 bedroomed maisonette, comprising kitchen/living/dining, 2 bathrooms, washroom, 2 terraces with the views.',
			'property_locationId'=>'10',
			'property_squareMetres'=>'95.5',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'0',
			'property_price'=>'910000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'2',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Springfield',
			'property_description'=>'First floor semi finished flat, consisting of open plan kitchen living dining,three bedroom, bathroom, shower, front and back balconies,served with lift. Worth viewing!',
			'property_locationId'=>'10',
			'property_squareMetres'=>'75.1',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'110000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'3',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'The Orchard',
			'property_description'=>'A beautiful villa comprising of an open plan area for a kitchen, living and dining, ground floor bedroom (or could be converted into a garage), pool and deck area, 2 common bathrooms, 3 bedrooms, laundry room, 2 balconies and a large roof terrace. There is also 1 car space included.',
			'property_locationId'=>'6',
			'property_squareMetres'=>'109.4',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'0',
			'property_price'=>'1200000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'5',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'The Haven',
			'property_description'=>'This huge unconverted House of Character excellently located in a prime area with wonderful country views boasts itself with traditional character. Property needs minimal expenses to convert into a premium residence with 4 bedrooms, 2 bathrooms, large kitchen, living and dining overlooking a spacious outside area, large pool and gardens. A big first floor terrace enjoys breathtaking views of Maltese landscape and distant seaviews. A rare opportunity.',
			'property_locationId'=>'17',
			'property_squareMetres'=>'165.9',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'4',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'630000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'1',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Evergreen',
			'property_description'=>'A spacious corner elevated ground floor maisonette. Property comprises of an open plan kitchen /dining area leading onto an internal yard with a garden , large living room, 3 bedrooms and 2 bathrooms. This property also includes an interconnecting one car lock-up garage with a storage room.',
			'property_locationId'=>'11',
			'property_squareMetres'=>'85.3',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'340000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'6',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'Wayside',
			'property_description'=>'A luxuriously finished, 175 sq. metre town house forming part of a sophisticated residential complex. This property comprises of a large open plan kitchen / living area, 3 double bedrooms and 2 bathrooms.',
			'property_locationId'=>'11',
			'property_squareMetres'=>'175',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'720000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'7',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'The Hollies',
			'property_description'=>'This semi converted bungalow consists of a living and study area, guest toilet facilities, courtyard, dining area, and kitchen. The second floor consists of 2 bedrooms, bathroom and washroom. Full roof and a good sized basement. Worth viewing.',
			'property_locationId'=>'10',
			'property_squareMetres'=>'75.9',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'2',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'520000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'1',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Fairview',
			'property_description'=>'Luxury finished first floor maisonette with a block of only two in a very quiet area. This property comprises of a seperate kitchen dining, large sitting room, three bedrooms, bathroom, back terrace, washroom and half roof. Must be seen.',
			'property_locationId'=>'16',
			'property_squareMetres'=>'85.2',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'1100000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'2',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'Oaklands',
			'property_description'=>'Luxury finished elevated ground floor flat in a quiet area. This property comprises of a large kitchen dining open plan, three bedrooms, two bathrooms, and two yards. Sold furnished and has a two car optional garage.',
			'property_locationId'=>'7',
			'property_squareMetres'=>'99.8',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'1405000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'1',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'Greenacres',
			'property_description'=>'This is a ground floor maisonette location in a prime area comprising of three bedrooms, bathroom, kitchen dining, boxroom internral yard and backyard. Must be seen.',
			'property_locationId'=>'10',
			'property_squareMetres'=>'75.6',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'0',
			'property_hasGarden'=>'1',
			'property_price'=>'450000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'4',
			'property_statusId'=>'1',
			'property_vendorId'=>'5',
			'property_name'=>'Downtown',
			'property_description'=>'This penthouse consists of 2 bedrooms, main bathroom and an open space for a kitchen living and dining with a front balcony. Garage also included.',
			'property_locationId'=>'16',
			'property_squareMetres'=>'71.8',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'2',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'0',
			'property_price'=>'750000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'5',
			'property_statusId'=>'1',
			'property_vendorId'=>'1',
			'property_name'=>'Sands of Time',
			'property_description'=>'This highly finished, 3 bedroom first floor house of character enjoys all the tranquility and countryside views that only Gzira can offer. Property further consists of a large and spacious kitchen, living and dining, main bathroom, en suite bathroom, utility room, and a large wide balcony overlooking the countryside. Garages available.',
			'property_locationId'=>'18',
			'property_squareMetres'=>'80.8',
			'property_bathrooms'=>'2',
			'property_bedrooms'=>'3',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'820000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
		));

		DB::table('properties')->insert(array(
			'property_typeId'=>'6',
			'property_statusId'=>'1',
			'property_vendorId'=>'2',
			'property_name'=>'Woodlands',
			'property_description'=>'Highly furnished town house and 10 minutes away from the seafront. Comprises of open plan kitchen/living/dining, main bedroom, bathroom, boxroom and front balcony overlooking green area. Ready to move in. Good investment!',
			'property_locationId'=>'10',
			'property_squareMetres'=>'87.8',
			'property_bathrooms'=>'1',
			'property_bedrooms'=>'1',
			'property_hasGarage'=>'1',
			'property_hasGarden'=>'1',
			'property_price'=>'210000',
			'property_isActive'=>'1',
			'property_isDeleted'=>'0',
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
		DB::table('properties')->delete();
	}

}