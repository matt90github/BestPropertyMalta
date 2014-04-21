<?php

/* Offer Status Model Class */

class Offer_Status extends Eloquent {

    //Database table
	protected $table = 'offer_statuses';

    //Primary key of the offer_statuses table
	protected $primaryKey  = 'offer_status_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('offer_status_id','offer_status_name', 'offer_status_description');
    
    /**
     * Get the offer status id.
     * 
     * @return int
     */
	public function getOfferStatusId()
    {
    	return $this->offer_status_id;
    }

	/**
	 * Validate offer status creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_offer_status_rules = array(
		 	'offer_status_name'=>'Required|Min:2|Unique:offer_statuses,offer_status_name',
		 	'offer_status_description'=>'Required|Min:20'
		);

		$create_offer_status_messages = array(
    		'offer_status_name.unique' => 'Provided Offer Status is already in use'
		);

		return Validator::make(Input::all(), $create_offer_status_rules, $create_offer_status_messages);
	}

	/**
	 * Validate offer status modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($offer_status_id)
	{
		$edit_offer_status_rules = array(
		 	'offer_status_name'=>'Required|Min:2|Unique:offer_statuses,offer_status_name,'.$offer_status_id.',offer_status_id',
		 	'offer_status_description'=>'Required|Min:20'
		);

		$edit_offer_status_messages = array(
    		'offer_status_name.unique' => 'Provided Offer Status is already in use'
		);

		return Validator::make(Input::all(), $edit_offer_status_rules, $edit_offer_status_messages);
	}
}