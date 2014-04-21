<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/* Customer Model Class */

class Customer extends Eloquent implements UserInterface, RemindableInterface {
	
	//Database table
	protected $table = 'customers';

	//Primary key of the customers table
	protected $primaryKey  = 'customer_id';

	//The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('customer_id','customer_type', 'customer_title', 'customer_firstName', 
		'customer_lastName', 'customer_idCardNumber', 'customer_username', 'customer_password', 'customer_phoneNumber', 
		'customer_mobileNumber', 'customer_emailAddress', 'customer_addressLine1', 'customer_addressLine2', 
		'customer_countryId', 'customer_dateOfBirth', 'customer_isActive', 'customer_isDeleted');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('customer_password');
	protected $guarded = array('customer_id', 'customer_password');
	
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
		return $this->customer_password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->customer_emailAddress;
	}

	/**
	 * Get the id of the customer.
	 *
	 * @return int
	 */
	public function getCustomerId()
    {
    	return $this->customer_id;
    }

	/**
	 * Get the customer's full name.
	 *
	 * @return string
	 */
	public function getName()
    {
    	return $this->customer_firstName. ' ' . $this->customer_lastName;
    }

	/**
	 * Get the customer's first name.
	 *
	 * @return string
	 */
    public function getFirstName()
    {
    	return $this->customer_firstName;
    }

	/**
	 * Get the customer's last name.
	 *
	 * @return string
	 */
    public function getLastName()
    {
    	return $this->customer_lastName;
    }

	/**
	 * Get the customer's email address.
	 *
	 * @return string
	 */
    public function getEmailAddress()
    {
    	return $this->customer_emailAddress;
    }

	/**
	 * Get the customer type.
	 *
	 * @return string
	 */
	public function getType()
    {
    	return $this->customer_type;
    }

	/**
	 * Get the customer title.
	 *
	 * @return string
	 */
	public function getTitle()
    {
    	return $this->customer_title;
    }

	/**
	 * Get the customer's id and full name.
	 *
	 * @return string
	 */
    public function getFullNameAttribute()
    {
        return $this->attributes['customer_id'].': '.$this->attributes['customer_firstName'].' '.$this->attributes['customer_lastName'];
    }    

	/**
	 * Get the customer's full name.
	 *
	 * @return string
	 */
    public function getFEFullNameAttribute()
    {
        return $this->attributes['customer_firstName'].' '.$this->attributes['customer_lastName'];
    }   

	/**
	 * Validate login method.
	 *
	 * @return object Validator
	 */
	public static function validate_login()
	{ 
		$customer_login_rules = array(
		 	'customer_emailAddress'=>'Required|Min:6|Email',
	     	'customer_password'=>'Required|Min:8'
		);

		return Validator::make(Input::all(), $customer_login_rules);
	}

	/**
	 * Validate password change method.
	 *
	 * @return object Validator
	 */
	public static function validate_changePassword()
	{ 
		$customer_cp_rules = array(
		 	'customer_old_password'=>'Required|Min:8',
	     	'customer_new_password'=>'Required|Min:8|Same:customer_new_password_confirmation',
	     	'customer_new_password_confirmation'=>'Required|Min:8'
		);

		return Validator::make(Input::all(), $customer_cp_rules);
	}

	/**
	 * Validate customer creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_customer_rules = array(
		 	'customer_type'=>'Required',
		 	'customer_title'=>'Required',
		 	'customer_firstName'=>'Required|Min:2',
		 	'customer_lastName'=>'Required|Min:2',
			'customer_idCardNumber'=>'Required|Min:6',
	     	'customer_username'=>'Required|Min:6|Unique:customers,customer_username',
			'customer_password'=>'Required|Min:8|Same:customer_password_confirmation',
	     	'customer_password_confirmation'=>'Required|Min:8',
			'customer_phoneNumber'=>'Numeric',
			'customer_mobileNumber'=>'Required|Numeric',
		 	'customer_emailAddress'=>'Required|Min:6|Email|Unique:customers,customer_emailAddress',
			'customer_addressLine1'=>'Required|Min:20',
			'customer_countryId'=>'Required',
			'customer_dateOfBirth'=>'Required'
		);

		$create_customer_messages = array(
    		'customer_emailAddress.unique' => 'Provided Email Address is already in use',
    		'customer_username.unique' => 'Provided Username is already in use'
		);

		return Validator::make(Input::all(), $create_customer_rules, $create_customer_messages);
	}

	/**
	 * Validate customer modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($customer_id)
	{
		$edit_customer_rules = array(
			'customer_type'=>'Required',
		 	'customer_title'=>'Required',
		 	'customer_firstName'=>'Required|Min:2',
		 	'customer_lastName'=>'Required|Min:2',
			'customer_idCardNumber'=>'Required|Min:6',
	     	'customer_username'=>'Required|Min:6|Unique:customers,customer_username,'.$customer_id.',customer_id',
			'customer_phoneNumber'=>'Numeric|Min:8',
			'customer_mobileNumber'=>'Required|Numeric|Min:8',
		 	'customer_emailAddress'=>'Required|Min:6|Email|Unique:customers,customer_emailAddress,'.$customer_id.',customer_id',
			'customer_addressLine1'=>'Required|Min:20',
			'customer_countryId'=>'Required',
			'customer_dateOfBirth'=>'Required'
		);

		$edit_customer_messages = array(
    		'customer_emailAddress.unique' => 'Provided Email Address is already in use',
    		'customer_username.unique' => 'Provided Username is already in use'
		);

		return Validator::make(Input::all(), $edit_customer_rules, $edit_customer_messages);
	}

}