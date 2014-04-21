<?php

/* Staff Role Model Class */

class Staff_Role extends Eloquent {

	//Database table
	protected $table = 'staff_roles';

	//Primary key of the staff_roles table
	protected $primaryKey  = 'staff_role_id';

	//The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('staff_role_id','staff_role_name','staff_role_description');

	/**
	 * Validate staff role creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_staff_role_rules = array(
		 	'staff_role_name'=>'Required|Min:2|Unique:staff_roles,staff_role_name',
		 	'staff_role_description'=>'Required|Min:20'
		);

		$create_staff_role_messages = array(
    		'staff_role_name.unique' => 'Provided Role Name is already in use'
		);

		return Validator::make(Input::all(), $create_staff_role_rules, $create_staff_role_messages);
	}

	/**
	 * Validate staff role modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($staff_role_id)
	{
		$edit_staff_role_rules = array(
		 	'staff_role_name'=>'Required|Min:2|Unique:staff_roles,staff_role_name,'.$staff_role_id.',staff_role_id',
		 	'staff_role_description'=>'Required|Min:20'
		);

		$edit_staff_role_messages = array(
    		'staff_role_name.unique' => 'Provided Role Name is already in use'
		);

		return Validator::make(Input::all(), $edit_staff_role_rules, $edit_staff_role_messages);
	}
}