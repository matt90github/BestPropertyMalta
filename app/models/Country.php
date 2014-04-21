<?php

/* Country Model Class */

class Country extends Eloquent {

	//Database table
	protected $table = 'countries';

	//Primary key of the countries table
	protected $primaryKey  = 'country_id';
}