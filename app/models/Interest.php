<?php

/* Interest (Wish List) Model Class */

class Interest extends Eloquent {

    //Database table
	protected $table = 'interests';

    //Primary key of the interests table
	protected $primaryKey  = 'interest_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('interest_id', 'interest_customerId', 'interest_propertyId');

}