<?php

/* Property Model Class */

class Property extends Eloquent {

    //Database table
	protected $table = 'properties';

    //Primary key of the properties table
	protected $primaryKey  = 'property_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('property_id','property_typeId', 'property_statusId', 
		'property_vendorId', 'property_name', 'property_description', 'property_locationId', 
		'property_squareMetres', 'property_bathrooms', 'property_bedrooms', 'property_hasGarage', 
		'property_hasGarden', 'property_price', 'property_isActive', 'property_isDeleted');
	
    /**
     * Get the id of the property.
     *
     * @return int
     */
	public function getPropertyId()
    {
    	return $this->property_id;
    }

    /**
     * Get the id of the property and the property name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->attributes['property_id'].': '.$this->attributes['property_name'];
    }    

    /**
     * Get the id of the property status depending on the status name.
     *
     * @return int
     */
	public static function getStatusId($status_name)
    {
		$property_status = DB::table('property_statuses')
			->where('property_status_name', $status_name)
		 	->lists('property_status_id');
		
		if($property_status!=null)
		{
			foreach ($property_status as $status) {
				$propertystatus = Property_Status::find($status);
				$propertystatusId = $propertystatus->property_status_id;
 				return $propertystatusId;
			}
 		}
    }

    /**
     * Get the id of the 'for sale' property status.
     *
     * @return int
     */
	public static function getForSaleId()
    {
    	return self::getStatusId('For Sale');
    }

    /**
     * Get the id of the 'sold subject to contract' property status.
     *
     * @return int
     */
	public static function getSoldSTCId()
    {
    	return self::getStatusId('Sold Subject to Contract');
    }

    /**
     * Get the id of the 'sold' property status.
     *
     * @return int
     */
	public static function getSoldId()
    {
    	return self::getStatusId('Sold');
    }

	/**
	 * Validate property name while uploading images method.
	 *
	 * @return object Validator
	 */
   	public static function validate_upload()
	{ 
		$property_upload_rules = array(
		 	'property_name'=>'Required'
		);

		return Validator::make(Input::all(), $property_upload_rules);
	}

	/**
	 * Validate property creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_property_rules = array(
		 	'property_typeId'=>'Required',
		 	'property_statusId'=>'Required',
		 	'property_vendorId'=>'Required',
		 	'property_name'=>'Required|Min:2',
			'property_description'=>'Required|Min:20',
	     	'property_locationId'=>'Required',
			'property_squareMetres'=>'Required|Numeric',
	     	'property_bathrooms'=>'Required|Numeric',
			'property_bedrooms'=>'Required|Numeric',
			'property_price'=>'Required|Numeric'
		);

		return Validator::make(Input::all(), $create_property_rules);
	}

	/**
	 * Validate property modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit()
	{
		$edit_property_rules = array(
		 	'property_typeId'=>'Required',
		 	'property_statusId'=>'Required',
		 	'property_vendorId'=>'Required',
		 	'property_name'=>'Required|Min:2',
			'property_description'=>'Required|Min:20',
	     	'property_locationId'=>'Required',
			'property_squareMetres'=>'Required|Numeric',
	     	'property_bathrooms'=>'Required|Numeric',
			'property_bedrooms'=>'Required|Numeric',
			'property_price'=>'Required|Numeric'
		);

		return Validator::make(Input::all(), $edit_property_rules);
	}	
}