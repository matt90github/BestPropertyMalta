<?php

/* Offer Model Class */

class Offer extends Eloquent {

    //Database table
	protected $table = 'offers';

    //Primary key of the offers table
	protected $primaryKey  = 'offer_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('offer_id','offer_value', 'offer_propertyId', 
		'offer_buyerId', 'offer_statusId', 'offer_isDeleted');

    /**
     * Get the status id depending on the status name.
     * 
     * @return int
     */
	public static function getStatusId($status_name)
    {
		$offer_status = DB::table('offer_statuses')
			->where('offer_status_name', $status_name)
		 	->lists('offer_status_id');
		
		if($offer_status!=null)
		{
			foreach ($offer_status as $status) {
				$offerstatus = Offer_Status::find($status);
				$offerstatusId = $offerstatus->offer_status_id;
 				return $offerstatusId;
			}
 		}
    }

    /**
     * Get the awaiting approval status id.
     * 
     * @return int
     */
	public static function getAwaitingApprovalId()
    {
    	return self::getStatusId('Awaiting Approval');
    }

    /**
     * Get the accepted status id.
     * 
     * @return int
     */
	public static function getAcceptedId()
    {
    	return self::getStatusId('Accepted');
    }

    /**
     * Get the confirmed status id.
     * 
     * @return int
     */
	public static function getConfirmedId()
    {
    	return self::getStatusId('Confirmed');
    }

    /**
     * Get the rejected status id.
     * 
     * @return int
     */
	public static function getRejectedId()
    {
    	return self::getStatusId('Rejected');
    }

    /**
     * Get the cancelled status id.
     * 
     * @return int
     */
	public static function getCancelledId()
    {
    	return self::getStatusId('Cancelled');
    }

	/**
	 * Validate offer creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_offer_rules = array(
		 	'offer_value'=>'Required|Numeric',
		 	'offer_propertyId'=>'Required',
		 	'offer_buyerId'=>'Required',
		 	'offer_statusId'=>'Required'
		);

		return Validator::make(Input::all(), $create_offer_rules);
	}

	/**
	 * Validate offer modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit()
	{
		$edit_offer_rules = array(
		 	'offer_value'=>'Required|Numeric',
		 	'offer_propertyId'=>'Required',
		 	'offer_buyerId'=>'Required',
		 	'offer_statusId'=>'Required'
		);

		return Validator::make(Input::all(), $edit_offer_rules);
	}	

}