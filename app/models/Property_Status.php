<?php

/* Property Status Model Class */

class Property_Status extends Eloquent {

    //Database table
	protected $table = 'property_statuses';

    //Primary key of the property_statuses table
	protected $primaryKey  = 'property_status_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('property_status_id','property_status_name', 'property_status_description');

	/**
	 * Validate property status creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_property_status_rules = array(
		 	'property_status_name'=>'Required|Min:2|Unique:property_statuses,property_status_name',
		 	'property_status_description'=>'Required|Min:20'
		);

		$create_property_status_messages = array(
    		'property_status_name.unique' => 'Provided Property Status is already in use'
		);

		return Validator::make(Input::all(), $create_property_status_rules, $create_property_status_messages);
	}

	/**
	 * Validate property status modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($property_status_id)
	{
		$edit_property_status_rules = array(
		 	'property_status_name'=>'Required|Min:2|Unique:property_statuses,property_status_name,'.$property_status_id.',property_status_id',
		 	'property_status_description'=>'Required|Min:20'
		);

		$edit_property_status_messages = array(
    		'property_status_name.unique' => 'Provided Property Status is already in use'
		);

		return Validator::make(Input::all(), $edit_property_status_rules, $edit_property_status_messages);
	}
}