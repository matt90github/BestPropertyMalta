<?php

//IMS Customer Controller Class

class CustomersController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS customer index page.
     */
	public function get_index(){
		$allcustomers = DB::table('customers')->where('customer_isDeleted', '!=', '1')->orderBy('customer_firstName')->paginate(10);

		$this->layout->content = View::make('customers.index')
			->with('title', 'List of Customers')
			->with('customers', $allcustomers);
	}

    /**
     * Show the IMS customer index page filtered by buyers.
     */
	public function get_buyersindex(){
		$allcustomers = DB::table('customers')
				->where('customer_isDeleted', '!=', '1')
				->where('customer_type', 'Buyer')
				->orderBy('customer_firstName')->paginate(10);

		$this->layout->content = View::make('customers.index')
			->with('title', 'List of Customers')
			->with('customers', $allcustomers);
	}

    /**
     * Show the IMS customer index page filtered by vendors.
     */
	public function get_vendorsindex(){
		$allcustomers = DB::table('customers')
				->where('customer_isDeleted', '!=', '1')
				->where('customer_type', 'Vendor')
				->orderBy('customer_firstName')->paginate(10);

		$this->layout->content = View::make('customers.index')
			->with('title', 'List of Customers')
			->with('customers', $allcustomers);
	}

    /**
     * Show the IMS customer details page.
     */
	public function get_view($customer_id){

		if (Customer::find($customer_id) != null && !Customer::find($customer_id)->customer_isDeleted) {

			$customer_countryId = Customer::find($customer_id)->customer_countryId;
			$customer_countryName = Country::find($customer_countryId)->country_name;

			$customer_addressLine2 = Customer::find($customer_id)->customer_addressLine2;
			
			if($customer_addressLine2=="")
				$customer_addressLine2 = 'N/A';

			$customer_phoneNumber = Customer::find($customer_id)->customer_phoneNumber;

			if($customer_phoneNumber=="")
				$customer_phoneNumber = 'N/A';

			$customer_isActive = Customer::find($customer_id)->customer_isActive;
			$customer_active = 'No';

			if($customer_isActive==1)
				$customer_active = 'Yes';

			$customer_isDeleted = Customer::find($customer_id)->customer_isDeleted;
			$customer_deleted = 'No';

			if($customer_isDeleted==1)
				$customer_deleted = 'Yes';

			$this->layout->content = View::make('customers.view')
				->with('title', 'Customer View Page')
				->with('customer', Customer::find($customer_id))
				->with('customer_country', $customer_countryName)
				->with('customer_addressLine2', $customer_addressLine2)
				->with('customer_phoneNumber', $customer_phoneNumber)
				->with('customer_active', $customer_active)
				->with('customer_deleted', $customer_deleted);
		}

		else
			return Redirect::route('customers')
				->with('error-message', 'Requested Customer was not found');
	}

    /**
     * Show the IMS customer creation page.
     */
	public function get_new(){

        $customer_types = array('' => 'Select One','Buyer'=>'Buyer','Vendor'=>'Vendor');

		$countries = array('' => 'Select One') + 
			Country::lists('country_name', 'country_id');

		$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
			'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
			'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
			'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

		$this->layout->content = View::make('customers.new')
			->with('title', 'Add New Customer')
			->with('customer_type',$customer_types)
			->with('customer_countryId', $countries)
			->with('customer_title', $titles);
	}

    /**
     * Validate and create the customer.
     */
	public function post_create(){
	
		$dob = str_replace("/", "-", Input::get('customer_dateOfBirth'));
		$date_dob = new DateTime($dob);
		$formatted_dob = date_format($date_dob, 'Y-m-d H:i:s');

		$now = new DateTime();

		if(Input::has('customer_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		$validation = Customer::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('new_customer')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {
			Customer::create(array(
				'customer_title'=>Input::get('customer_title'),
				'customer_firstName'=>Input::get('customer_firstName'),
				'customer_lastName'=>Input::get('customer_lastName'),
				'customer_emailAddress'=>Input::get('customer_emailAddress'),
				'customer_username'=>Input::get('customer_username'),
				'customer_password'=>Hash::make(Input::get('customer_password')),
				'customer_type'=>Input::get('customer_type'),
				'customer_idCardNumber'=>Input::get('customer_idCardNumber'),
				'customer_dateOfBirth'=>$formatted_dob,
				'customer_addressLine1'=>Input::get('customer_addressLine1'),
				'customer_addressLine2'=>Input::get('customer_addressLine2'),
				'customer_countryId'=>Input::get('customer_countryId'),
				'customer_phoneNumber'=>Input::get('customer_phoneNumber'),
				'customer_mobileNumber'=>Input::get('customer_mobileNumber'),
				'customer_isActive'=>$isActive,
				'customer_isDeleted'=>'0'
			));

			// Mail::send('customers.mails.welcome', array(
			// 	'firstname'=>Input::get('customer_firstName')), function($message){
   			// 	$message->to(Input::get('customer_emailAddress'), Input::get('customer_firstName').' '.Input::get('customer_lastName'))->subject('Your Registration with Best Property Malta');
   			//  });

			return Redirect::route('customers')
				->with('message', 'The customer was created successfully!');
		}
	}

    /**
     * Show the IMS customer modification page.
     */
	public function get_edit($customer_id){
		if(Customer::find($customer_id)!=null){
	        $customer_types = array('' => 'Select One','Buyer'=>'Buyer','Vendor'=>'Vendor');

			$countries = array('' => 'Select One') + 
				Country::lists('country_name', 'country_id');

			$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
				'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
				'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
				'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

			$customer_isActive = Customer::find($customer_id)->customer_isActive;

			if($customer_isActive==1)
				$checkbox_enabled=true;
			else
				$checkbox_enabled=false;

			$this->layout->content = View::make('customers.edit')
				->with('title', 'Edit Customer')
				->with('customer', Customer::find($customer_id))
				->with('customer_type',$customer_types)
				->with('customer_countryId', $countries)
				->with('customer_title', $titles)
				->with('checkbox_enabled', $checkbox_enabled);
		}
		else{
			return Redirect::route('customers')
				->with('error-message', 'Requested Customer was not found');
		}
	}

    /**
     * Validate and edit the customer.
     */
	public function put_update(){
		$customer_id = Input::get('customer_id');

		$dob = str_replace("/", "-", Input::get('customer_dateOfBirth'));
		$formatted_dob = date_format(new DateTime($dob), 'Y-m-d H:i:s');
		$now = new DateTime();

		if(Input::has('customer_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		$validation = Customer::validate_edit($customer_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_customer', $customer_id)
	 			->withErrors($validation);
		}

		else {
			Customer::find($customer_id)->update(array(
				'customer_title'=>Input::get('customer_title'),
				'customer_firstName'=>Input::get('customer_firstName'),
				'customer_lastName'=>Input::get('customer_lastName'),
				'customer_emailAddress'=>Input::get('customer_emailAddress'),
				'customer_username'=>Input::get('customer_username'),
				'customer_type'=>Input::get('customer_type'),
				'customer_idCardNumber'=>Input::get('customer_idCardNumber'),
				'customer_dateOfBirth'=>$formatted_dob,
				'customer_addressLine1'=>Input::get('customer_addressLine1'),
				'customer_addressLine2'=>Input::get('customer_addressLine2'),
				'customer_countryId'=>Input::get('customer_countryId'),
				'customer_phoneNumber'=>Input::get('customer_phoneNumber'),
				'customer_mobileNumber'=>Input::get('customer_mobileNumber'),
				'customer_isActive'=>$isActive,
				'customer_isDeleted'=>'0'
			));

			return Redirect::route('customer', $customer_id)
				->with('message', 'The customer was updated successfully!');
		}
	}

    /**
     * Show the IMS customer password modification page.
     */
	public function get_changepassword($customer_id){
		$this->layout->content = View::make('customers.changepassword')
			->with('title', 'Change Password')
			->with('customer', Customer::find($customer_id));
	}

    /**
     * Validate and update the customer's password.
     */
	public function put_updatepassword(){
		$customer_id = Input::get('customer_id');

		$customer = Customer::find($customer_id);

		$validation = Customer::validate_changepassword();

		if($validation->fails()) {
	 		return Redirect::back()
	 			->withErrors($validation);
		}

		else {
			if (Hash::check(Input::get('customer_old_password'), $customer->customer_password)) {
			
		 		Customer::find($customer_id)->update(array(
					'customer_password'=>Hash::make(Input::get('customer_new_password')),
				));

				return Redirect::route('customer', $customer_id)
					->with('message', 'The password was updated successfully!');
			}

			else {
				return Redirect::route('change_customer_password', $customer_id)
		 			->with('error-message', 'The old password inputted is not correct!');
			}
		}
	}

    /**
     * Show the IMS customer deletion page.
     */
	public function get_destroy($customer_id){
		$this->layout->content = View::make('customers.confirm-delete')
			->with('title', 'Confirm Customer Deletion')
			->with('customer', Customer::find($customer_id));
	}

    /**
     * Update the customer to a deleted state.
     */
	public function delete_destroy(){
		Customer::find(Input::get('customer_id'))->update(array(
				'customer_isActive'=>'0',
				'customer_isDeleted'=>'1'
		));
		return Redirect::route('customers')
				->with('message', 'The customer was deleted successfully!');
	}

}