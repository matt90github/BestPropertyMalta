<?php

use Illuminate\Database\Migrations\Migration;

class AddCountries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('countries')->insert(array('country_name'=>'Afghanistan'));
		DB::table('countries')->insert(array('country_name'=>'Albania'));
		DB::table('countries')->insert(array('country_name'=>'Algeria'));
		DB::table('countries')->insert(array('country_name'=>'American Samoa'));
		DB::table('countries')->insert(array('country_name'=>'Andorra'));
		DB::table('countries')->insert(array('country_name'=>'Angola'));
		DB::table('countries')->insert(array('country_name'=>'Anguilla'));
		DB::table('countries')->insert(array('country_name'=>'Antarctica'));
		DB::table('countries')->insert(array('country_name'=>'Antigua and Barbuda'));
		DB::table('countries')->insert(array('country_name'=>'Argentina'));
		DB::table('countries')->insert(array('country_name'=>'Armenia'));
		DB::table('countries')->insert(array('country_name'=>'Arctic Ocean'));
		DB::table('countries')->insert(array('country_name'=>'Aruba'));
		DB::table('countries')->insert(array('country_name'=>'Ashmore and Cartier Islands'));
		DB::table('countries')->insert(array('country_name'=>'Atlantic Ocean'));
		DB::table('countries')->insert(array('country_name'=>'Australia'));
		DB::table('countries')->insert(array('country_name'=>'Austria'));
		DB::table('countries')->insert(array('country_name'=>'Azerbaijan'));
		DB::table('countries')->insert(array('country_name'=>'Bahamas'));
		DB::table('countries')->insert(array('country_name'=>'Bahrain'));
		DB::table('countries')->insert(array('country_name'=>'Baker Island'));
		DB::table('countries')->insert(array('country_name'=>'Bangladesh'));
		DB::table('countries')->insert(array('country_name'=>'Barbados'));
		DB::table('countries')->insert(array('country_name'=>'Bassas da India'));
		DB::table('countries')->insert(array('country_name'=>'Belarus'));
		DB::table('countries')->insert(array('country_name'=>'Belgium'));
		DB::table('countries')->insert(array('country_name'=>'Belize'));
		DB::table('countries')->insert(array('country_name'=>'Benin'));
		DB::table('countries')->insert(array('country_name'=>'Bermuda'));
		DB::table('countries')->insert(array('country_name'=>'Bhutan'));
		DB::table('countries')->insert(array('country_name'=>'Bolivia'));
		DB::table('countries')->insert(array('country_name'=>'Bosnia and Herzegovina'));
		DB::table('countries')->insert(array('country_name'=>'Botswana'));
		DB::table('countries')->insert(array('country_name'=>'Bouvet Island'));
		DB::table('countries')->insert(array('country_name'=>'Brazil'));
		DB::table('countries')->insert(array('country_name'=>'British Virgin Islands'));
		DB::table('countries')->insert(array('country_name'=>'Brunei'));
		DB::table('countries')->insert(array('country_name'=>'Bulgaria'));
		DB::table('countries')->insert(array('country_name'=>'Burkina Faso'));
		DB::table('countries')->insert(array('country_name'=>'Burundi'));
		DB::table('countries')->insert(array('country_name'=>'Cambodia'));
		DB::table('countries')->insert(array('country_name'=>'Cameroon'));
		DB::table('countries')->insert(array('country_name'=>'Canada'));
		DB::table('countries')->insert(array('country_name'=>'Cape Verde'));
		DB::table('countries')->insert(array('country_name'=>'Cayman Islands'));
		DB::table('countries')->insert(array('country_name'=>'Central African Republic'));
		DB::table('countries')->insert(array('country_name'=>'Chad'));
		DB::table('countries')->insert(array('country_name'=>'Chile'));
		DB::table('countries')->insert(array('country_name'=>'China'));
		DB::table('countries')->insert(array('country_name'=>'Christmas Island'));
		DB::table('countries')->insert(array('country_name'=>'Clipperton Island'));
		DB::table('countries')->insert(array('country_name'=>'Cocos Islands'));
		DB::table('countries')->insert(array('country_name'=>'Colombia'));
		DB::table('countries')->insert(array('country_name'=>'Comoros'));
		DB::table('countries')->insert(array('country_name'=>'Cook Islands'));
		DB::table('countries')->insert(array('country_name'=>'Coral Sea Islands'));
		DB::table('countries')->insert(array('country_name'=>'Costa Rica'));
		DB::table('countries')->insert(array('country_name'=>'Cote dIvoire'));
		DB::table('countries')->insert(array('country_name'=>'Croatia'));
		DB::table('countries')->insert(array('country_name'=>'Cuba'));
		DB::table('countries')->insert(array('country_name'=>'Cyprus'));
		DB::table('countries')->insert(array('country_name'=>'Czech Republic'));
		DB::table('countries')->insert(array('country_name'=>'Denmark'));
		DB::table('countries')->insert(array('country_name'=>'Democratic Republic of the Congo'));
		DB::table('countries')->insert(array('country_name'=>'Djibouti'));
		DB::table('countries')->insert(array('country_name'=>'Dominica'));
		DB::table('countries')->insert(array('country_name'=>'Dominican Republic'));
		DB::table('countries')->insert(array('country_name'=>'East Timor'));
		DB::table('countries')->insert(array('country_name'=>'Ecuador'));
		DB::table('countries')->insert(array('country_name'=>'Egypt'));
		DB::table('countries')->insert(array('country_name'=>'El Salvador'));
		DB::table('countries')->insert(array('country_name'=>'Equatorial Guinea'));
		DB::table('countries')->insert(array('country_name'=>'Eritrea'));
		DB::table('countries')->insert(array('country_name'=>'Estonia'));
		DB::table('countries')->insert(array('country_name'=>'Ethiopia'));
		DB::table('countries')->insert(array('country_name'=>'Europa Island'));
		DB::table('countries')->insert(array('country_name'=>'Falkland Islands values (Islas Malvinas)'));
		DB::table('countries')->insert(array('country_name'=>'Faroe Islands'));
		DB::table('countries')->insert(array('country_name'=>'Fiji'));
		DB::table('countries')->insert(array('country_name'=>'Finland'));
		DB::table('countries')->insert(array('country_name'=>'France'));
		DB::table('countries')->insert(array('country_name'=>'French Guiana'));
		DB::table('countries')->insert(array('country_name'=>'French Polynesia'));
		DB::table('countries')->insert(array('country_name'=>'French Southern and Antarctic Lands'));
		DB::table('countries')->insert(array('country_name'=>'Gabon'));
		DB::table('countries')->insert(array('country_name'=>'Gambia'));
		DB::table('countries')->insert(array('country_name'=>'Gaza Strip'));
		DB::table('countries')->insert(array('country_name'=>'Georgia'));
		DB::table('countries')->insert(array('country_name'=>'Germany'));
		DB::table('countries')->insert(array('country_name'=>'Ghana'));
		DB::table('countries')->insert(array('country_name'=>'Gibraltar'));
		DB::table('countries')->insert(array('country_name'=>'Glorioso Islands'));
		DB::table('countries')->insert(array('country_name'=>'Greece'));
		DB::table('countries')->insert(array('country_name'=>'Greenland'));
		DB::table('countries')->insert(array('country_name'=>'Grenada'));
		DB::table('countries')->insert(array('country_name'=>'Guadeloupe'));
		DB::table('countries')->insert(array('country_name'=>'Guam'));
		DB::table('countries')->insert(array('country_name'=>'Guatemala'));
		DB::table('countries')->insert(array('country_name'=>'Guernsey'));
		DB::table('countries')->insert(array('country_name'=>'Guinea'));
		DB::table('countries')->insert(array('country_name'=>'Guinea-Bissau'));
		DB::table('countries')->insert(array('country_name'=>'Guyana'));
		DB::table('countries')->insert(array('country_name'=>'Haiti'));
		DB::table('countries')->insert(array('country_name'=>'Heard Island and McDonald Islands'));
		DB::table('countries')->insert(array('country_name'=>'Honduras'));
		DB::table('countries')->insert(array('country_name'=>'Hong Kong'));
		DB::table('countries')->insert(array('country_name'=>'Howland Island'));
		DB::table('countries')->insert(array('country_name'=>'Hungary'));
		DB::table('countries')->insert(array('country_name'=>'Iceland'));
		DB::table('countries')->insert(array('country_name'=>'India'));
		DB::table('countries')->insert(array('country_name'=>'Indian Ocean'));
		DB::table('countries')->insert(array('country_name'=>'Indonesia'));
		DB::table('countries')->insert(array('country_name'=>'Iran'));
		DB::table('countries')->insert(array('country_name'=>'Iraq'));
		DB::table('countries')->insert(array('country_name'=>'Ireland'));
		DB::table('countries')->insert(array('country_name'=>'Isle of Man'));
		DB::table('countries')->insert(array('country_name'=>'Israel'));
		DB::table('countries')->insert(array('country_name'=>'Italy'));
		DB::table('countries')->insert(array('country_name'=>'Jamaica'));
		DB::table('countries')->insert(array('country_name'=>'Jan Mayen'));
		DB::table('countries')->insert(array('country_name'=>'Japan'));
		DB::table('countries')->insert(array('country_name'=>'Jarvis Island'));
		DB::table('countries')->insert(array('country_name'=>'Jersey'));
		DB::table('countries')->insert(array('country_name'=>'Johnston Atoll'));
		DB::table('countries')->insert(array('country_name'=>'Jordan'));
		DB::table('countries')->insert(array('country_name'=>'Juan de Nova Island'));
		DB::table('countries')->insert(array('country_name'=>'Kazakhstan'));
		DB::table('countries')->insert(array('country_name'=>'Kenya'));
		DB::table('countries')->insert(array('country_name'=>'Kingman Reef'));
		DB::table('countries')->insert(array('country_name'=>'Kiribati'));
		DB::table('countries')->insert(array('country_name'=>'Kerguelen Archipelago'));
		DB::table('countries')->insert(array('country_name'=>'Kosovo'));
		DB::table('countries')->insert(array('country_name'=>'Kuwait'));
		DB::table('countries')->insert(array('country_name'=>'Kyrgyzstan'));
		DB::table('countries')->insert(array('country_name'=>'Laos'));
		DB::table('countries')->insert(array('country_name'=>'Latvia'));
		DB::table('countries')->insert(array('country_name'=>'Lebanon'));
		DB::table('countries')->insert(array('country_name'=>'Lesotho'));
		DB::table('countries')->insert(array('country_name'=>'Liberia'));
		DB::table('countries')->insert(array('country_name'=>'Libya'));
		DB::table('countries')->insert(array('country_name'=>'Liechtenstein'));
		DB::table('countries')->insert(array('country_name'=>'Lithuania'));
		DB::table('countries')->insert(array('country_name'=>'Luxembourg'));
		DB::table('countries')->insert(array('country_name'=>'Macau'));
		DB::table('countries')->insert(array('country_name'=>'Macedonia'));
		DB::table('countries')->insert(array('country_name'=>'Madagascar'));
		DB::table('countries')->insert(array('country_name'=>'Malawi'));
		DB::table('countries')->insert(array('country_name'=>'Malaysia'));
		DB::table('countries')->insert(array('country_name'=>'Maldives'));
		DB::table('countries')->insert(array('country_name'=>'Mali'));
		DB::table('countries')->insert(array('country_name'=>'Malta'));
		DB::table('countries')->insert(array('country_name'=>'Marshall Islands'));
		DB::table('countries')->insert(array('country_name'=>'Martinique'));
		DB::table('countries')->insert(array('country_name'=>'Mauritania'));
		DB::table('countries')->insert(array('country_name'=>'Mauritius'));
		DB::table('countries')->insert(array('country_name'=>'Mayotte'));
		DB::table('countries')->insert(array('country_name'=>'Mexico'));
		DB::table('countries')->insert(array('country_name'=>'Micronesia'));
		DB::table('countries')->insert(array('country_name'=>'Midway Islands'));
		DB::table('countries')->insert(array('country_name'=>'Moldova'));
		DB::table('countries')->insert(array('country_name'=>'Monaco'));
		DB::table('countries')->insert(array('country_name'=>'Mongolia'));
		DB::table('countries')->insert(array('country_name'=>'Montenegro'));
		DB::table('countries')->insert(array('country_name'=>'Montserrat'));
		DB::table('countries')->insert(array('country_name'=>'Morocco'));
		DB::table('countries')->insert(array('country_name'=>'Mozambique'));
		DB::table('countries')->insert(array('country_name'=>'Myanmar'));
		DB::table('countries')->insert(array('country_name'=>'Namibia'));
		DB::table('countries')->insert(array('country_name'=>'Nauru'));
		DB::table('countries')->insert(array('country_name'=>'Navassa Island'));
		DB::table('countries')->insert(array('country_name'=>'Nepal'));
		DB::table('countries')->insert(array('country_name'=>'Netherlands'));
		DB::table('countries')->insert(array('country_name'=>'Netherlands Antilles'));
		DB::table('countries')->insert(array('country_name'=>'New Caledonia'));
		DB::table('countries')->insert(array('country_name'=>'New Zealand'));
		DB::table('countries')->insert(array('country_name'=>'Nicaragua'));
		DB::table('countries')->insert(array('country_name'=>'Niger'));
		DB::table('countries')->insert(array('country_name'=>'Nigeria'));
		DB::table('countries')->insert(array('country_name'=>'Niue'));
		DB::table('countries')->insert(array('country_name'=>'Norfolk Island'));
		DB::table('countries')->insert(array('country_name'=>'North Korea'));
		DB::table('countries')->insert(array('country_name'=>'Northern Mariana Islands'));
		DB::table('countries')->insert(array('country_name'=>'Norway'));
		DB::table('countries')->insert(array('country_name'=>'Oman'));
		DB::table('countries')->insert(array('country_name'=>'Pacific Ocean'));
		DB::table('countries')->insert(array('country_name'=>'Pakistan'));
		DB::table('countries')->insert(array('country_name'=>'Palau'));
		DB::table('countries')->insert(array('country_name'=>'Palmyra Atoll'));
		DB::table('countries')->insert(array('country_name'=>'Panama'));
		DB::table('countries')->insert(array('country_name'=>'Papua New Guinea'));
		DB::table('countries')->insert(array('country_name'=>'Paracel Islands'));
		DB::table('countries')->insert(array('country_name'=>'Paraguay'));
		DB::table('countries')->insert(array('country_name'=>'Peru'));
		DB::table('countries')->insert(array('country_name'=>'Philippines'));
		DB::table('countries')->insert(array('country_name'=>'Pitcairn Islands'));
		DB::table('countries')->insert(array('country_name'=>'Poland'));
		DB::table('countries')->insert(array('country_name'=>'Portugal'));
		DB::table('countries')->insert(array('country_name'=>'Puerto Rico'));
		DB::table('countries')->insert(array('country_name'=>'Qatar'));
		DB::table('countries')->insert(array('country_name'=>'Reunion'));
		DB::table('countries')->insert(array('country_name'=>'Republic of the Congo'));
		DB::table('countries')->insert(array('country_name'=>'Romania'));
		DB::table('countries')->insert(array('country_name'=>'Russia'));
		DB::table('countries')->insert(array('country_name'=>'Rwanda'));
		DB::table('countries')->insert(array('country_name'=>'Saint Helena'));
		DB::table('countries')->insert(array('country_name'=>'Saint Kitts and Nevis'));
		DB::table('countries')->insert(array('country_name'=>'Saint Lucia'));
		DB::table('countries')->insert(array('country_name'=>'Saint Pierre and Miquelon'));
		DB::table('countries')->insert(array('country_name'=>'Saint Vincent and the Grenadines'));
		DB::table('countries')->insert(array('country_name'=>'Samoa'));
		DB::table('countries')->insert(array('country_name'=>'San Marino'));
		DB::table('countries')->insert(array('country_name'=>'Sao Tome and Principe'));
		DB::table('countries')->insert(array('country_name'=>'Saudi Arabia'));
		DB::table('countries')->insert(array('country_name'=>'Senegal'));
		DB::table('countries')->insert(array('country_name'=>'Serbia'));
		DB::table('countries')->insert(array('country_name'=>'Seychelles'));
		DB::table('countries')->insert(array('country_name'=>'Sierra Leone'));
		DB::table('countries')->insert(array('country_name'=>'Singapore'));
		DB::table('countries')->insert(array('country_name'=>'Slovakia'));
		DB::table('countries')->insert(array('country_name'=>'Slovenia'));
		DB::table('countries')->insert(array('country_name'=>'Solomon Islands'));
		DB::table('countries')->insert(array('country_name'=>'Somalia'));
		DB::table('countries')->insert(array('country_name'=>'South Africa'));
		DB::table('countries')->insert(array('country_name'=>'South Georgia and the South Sandwich Islands'));
		DB::table('countries')->insert(array('country_name'=>'South Korea'));
		DB::table('countries')->insert(array('country_name'=>'Spain'));
		DB::table('countries')->insert(array('country_name'=>'Spratly Islands'));
		DB::table('countries')->insert(array('country_name'=>'Sri Lanka'));
		DB::table('countries')->insert(array('country_name'=>'Sudan'));
		DB::table('countries')->insert(array('country_name'=>'Suriname'));
		DB::table('countries')->insert(array('country_name'=>'Svalbard'));
		DB::table('countries')->insert(array('country_name'=>'Swaziland'));
		DB::table('countries')->insert(array('country_name'=>'Sweden'));
		DB::table('countries')->insert(array('country_name'=>'Switzerland'));
		DB::table('countries')->insert(array('country_name'=>'Syria'));
		DB::table('countries')->insert(array('country_name'=>'Taiwan'));
		DB::table('countries')->insert(array('country_name'=>'Tajikistan'));
		DB::table('countries')->insert(array('country_name'=>'Tanzania'));
		DB::table('countries')->insert(array('country_name'=>'Thailand'));
		DB::table('countries')->insert(array('country_name'=>'Togo'));
		DB::table('countries')->insert(array('country_name'=>'Tokelau'));
		DB::table('countries')->insert(array('country_name'=>'Tonga'));
		DB::table('countries')->insert(array('country_name'=>'Trinidad and Tobago'));
		DB::table('countries')->insert(array('country_name'=>'Tromelin Island'));
		DB::table('countries')->insert(array('country_name'=>'Tunisia'));
		DB::table('countries')->insert(array('country_name'=>'Turkey'));
		DB::table('countries')->insert(array('country_name'=>'Turkmenistan'));
		DB::table('countries')->insert(array('country_name'=>'Turks and Caicos Islands'));
		DB::table('countries')->insert(array('country_name'=>'Tuvalu'));
		DB::table('countries')->insert(array('country_name'=>'Uganda'));
		DB::table('countries')->insert(array('country_name'=>'Ukraine'));
		DB::table('countries')->insert(array('country_name'=>'United Arab Emirates'));
		DB::table('countries')->insert(array('country_name'=>'United Kingdom'));
		DB::table('countries')->insert(array('country_name'=>'USA'));
		DB::table('countries')->insert(array('country_name'=>',Uruguay'));
		DB::table('countries')->insert(array('country_name'=>'Uzbekistan'));
		DB::table('countries')->insert(array('country_name'=>'Vanuatu'));
		DB::table('countries')->insert(array('country_name'=>'Venezuela'));
		DB::table('countries')->insert(array('country_name'=>'Viet Nam'));
		DB::table('countries')->insert(array('country_name'=>'Virgin Islands'));
		DB::table('countries')->insert(array('country_name'=>'Wake Island'));
		DB::table('countries')->insert(array('country_name'=>'Wallis and Futuna'));
		DB::table('countries')->insert(array('country_name'=>'West Bank'));
		DB::table('countries')->insert(array('country_name'=>'Western Sahara'));
		DB::table('countries')->insert(array('country_name'=>'Yemen'));
		DB::table('countries')->insert(array('country_name'=>'Yugoslavia'));
		DB::table('countries')->insert(array('country_name'=>'Zambia'));
		DB::table('countries')->insert(array('country_name'=>'Zimbabwe'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('countries')->delete();
	}

}