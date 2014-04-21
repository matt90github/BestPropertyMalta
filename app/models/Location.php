<?php

/* Location Model Class */

class Location extends Eloquent {

    //Database table
	protected $table = 'locations';

    //Primary key of the locations table
	protected $primaryKey  = 'location_id';
}