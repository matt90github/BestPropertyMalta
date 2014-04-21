<?php

/* Property Type Model Class */

class Property_Type extends Eloquent {

    //Database table
	protected $table = 'property_types';

    //Primary key of the property_types table
	protected $primaryKey  = 'property_type_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('property_type_id','property_type_name', 'property_type_description');

	/**
	 * Validate property type creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_property_type_rules = array(
		 	'property_type_name'=>'Required|Min:2|Unique:property_types,property_type_name',
		 	'property_type_description'=>'Required|Min:20'
		);

		$create_property_type_messages = array(
    		'property_type_name.unique' => 'Provided Property Type is already in use'
		);

		return Validator::make(Input::all(), $create_property_type_rules, $create_property_type_messages);
	}

	/**
	 * Validate property type modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($property_type_id)
	{
		$edit_property_type_rules = array(
		 	'property_type_name'=>'Required|Min:2|Unique:property_types,property_type_name,'.$property_type_id.',property_type_id',
		 	'property_type_description'=>'Required|Min:20'
		);

		$edit_property_type_messages = array(
    		'property_type_name.unique' => 'Provided Property Type is already in use'
		);

		return Validator::make(Input::all(), $edit_property_type_rules, $edit_property_type_messages);
	}
}