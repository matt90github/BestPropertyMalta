<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/* Staff Model Class */

class Staff extends Eloquent implements UserInterface, RemindableInterface {

	//Database table
	protected $table = 'staff';

	//Primary key of the staff table
	protected $primaryKey  = 'staff_id';

	//The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('staff_id','staff_roleId', 'staff_title', 'staff_firstName', 
		'staff_lastName', 'staff_idCardNumber', 'staff_username', 'staff_password', 'staff_phoneNumber', 
		'staff_mobileNumber', 'staff_emailAddress', 'staff_addressLine1', 'staff_addressLine2', 
		'staff_countryId', 'staff_dateOfBirth', 'staff_employmentDate','staff_isActive', 'staff_isDeleted');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('staff_password');
	protected $guarded = array('staff_id', 'staff_password');
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->staff_password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->staff_emailAddress;
	}

	/**
	 * Get the id of the staff member.
	 *
	 * @return int
	 */
	public function getStaffId()
    {
    	return $this->staff_id;
    }

	/**
	 * Get the staff member's full name.
	 *
	 * @return string
	 */
	public function getName()
    {
    	return $this->staff_firstName. ' ' . $this->staff_lastName;
    }

	/**
	 * Get the staff member's first name.
	 *
	 * @return string
	 */
    public function getFirstName()
    {
    	return $this->staff_firstName;
    }

  	/**
	 * Get the staff member's role.
	 *
	 * @return string
	 */
    public function getRole()
    {
    	return Staff_Role::find($this->staff_roleId)->staff_role_name;
    }

	/**
	 * Validate login method.
	 *
	 * @return object Validator
	 */
	public static function validate_login()
	{ 
		$staff_login_rules = array(
		 	'staff_emailAddress'=>'Required|Min:6|Email',
	     	'staff_password'=>'Required|Min:8'
		);

		return Validator::make(Input::all(), $staff_login_rules);
	}

	/**
	 * Validate password change method.
	 *
	 * @return object Validator
	 */
	public static function validate_changePassword()
	{ 
		$staff_cp_rules = array(
		 	'staff_old_password'=>'Required|Min:8',
	     	'staff_new_password'=>'Required|Min:8|Same:staff_new_password_confirmation',
	     	'staff_new_password_confirmation'=>'Required|Min:8'
		);

		return Validator::make(Input::all(), $staff_cp_rules);
	}

	/**
	 * Validate staff member creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_staff_rules = array(
		 	'staff_roleId'=>'Required',
		 	'staff_title'=>'Required',
		 	'staff_firstName'=>'Required|Min:2',
		 	'staff_lastName'=>'Required|Min:2',
			'staff_idCardNumber'=>'Required|Min:6',
	     	'staff_username'=>'Required|Min:6|Unique:staff,staff_username',
			'staff_password'=>'Required|Min:8|Same:staff_password_confirmation',
	     	'staff_password_confirmation'=>'Required|Min:8',
			'staff_phoneNumber'=>'Numeric',
			'staff_mobileNumber'=>'Required|Numeric',
		 	'staff_emailAddress'=>'Required|Min:6|Email|Unique:staff,staff_emailAddress',
			'staff_addressLine1'=>'Required|Min:20',
			'staff_countryId'=>'Required',
			'staff_dateOfBirth'=>'Required',
			'staff_employmentDate'=>'Required'
		);

		$create_staff_messages = array(
    		'staff_emailAddress.unique' => 'Provided Email Address is already in use',
    		'staff_username.unique' => 'Provided Username is already in use'
		);

		return Validator::make(Input::all(), $create_staff_rules, $create_staff_messages);
	}

	/**
	 * Validate staff member modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($staff_id)
	{
		$edit_staff_rules = array(
			'staff_roleId'=>'Required',
		 	'staff_title'=>'Required',
		 	'staff_firstName'=>'Required|Min:2',
		 	'staff_lastName'=>'Required|Min:2',
			'staff_idCardNumber'=>'Required|Min:6',
	     	'staff_username'=>'Required|Min:6|Unique:staff,staff_username,'.$staff_id.',staff_id',
			'staff_phoneNumber'=>'Numeric|Min:8',
			'staff_mobileNumber'=>'Required|Numeric|Min:8',
		 	'staff_emailAddress'=>'Required|Min:6|Email|Unique:staff,staff_emailAddress,'.$staff_id.',staff_id',
			'staff_addressLine1'=>'Required|Min:20',
			'staff_countryId'=>'Required',
			'staff_dateOfBirth'=>'Required',
			'staff_employmentDate'=>'Required',
		);

		$edit_staff_messages = array(
    		'staff_emailAddress.unique' => 'Provided Email Address is already in use',
    		'staff_username.unique' => 'Provided Username is already in use'
		);

		return Validator::make(Input::all(), $edit_staff_rules, $edit_staff_messages);
	}
}