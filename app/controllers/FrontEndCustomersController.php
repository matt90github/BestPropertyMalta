<?php

//Official Website Customer Controller Class

class FrontEndCustomersController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Show the official website's login page.
     */
	public function get_login(){
	    if (!Auth::guest()) 
	    	return Redirect::to('/')->with('message', 'You are already logged in!');
	    else
			$this->layout->content = View::make('frontend.customers.login');
	}

    /**
     * Validate and login the customer.
     */
	public function post_signedin(){

		$customerdata = array(
			'customer_emailAddress' => Input::get('customer_emailAddress'),
			'password' => Input::get('customer_password')
		);

		$validation = Customer::validate_login();

		if($validation->fails()) {
		 	return Redirect::back()
		 		->withErrors($validation)
		 		->withInput();
		}

		else{
			if (Auth::attempt($customerdata)) {

				$session_customer_id = Auth::user()->customer_id;
	   			return Redirect::to('/')->with('message', 'You are now logged in!');

			} else {
	   			return Redirect::route('customerlogin')
	      			->with('error-message', 'Your email address/password combination was incorrect. Please try again.')
	      			->withInput();
			}
		}
	}

    /**
     * Logout the customer and show the official website's logout page.
     */
	public function get_logout()
	{
		Auth::logout();
		return Redirect::route('home')->with('message', 'You are now logged out!'); 
	}

    /**
     * Show the official website's customer profile page.
     */
	public function get_view(){
		if (Auth::check()){
			$customer_id = Auth::user()->customer_id;

			$customer_countryId = Customer::find($customer_id)->customer_countryId;
			$customer_countryName = Country::find($customer_countryId)->country_name;

			$customer_addressLine2 = Customer::find($customer_id)->customer_addressLine2;
			
			if($customer_addressLine2=="")
				$customer_addressLine2 = 'N/A';

			$customer_phoneNumber = Customer::find($customer_id)->customer_phoneNumber;

			if($customer_phoneNumber=="")
				$customer_phoneNumber = 'N/A';

			$this->layout->content = View::make('frontend.customers.view')
				->with('title', 'Customer View Page')
				->with('customer', Customer::find($customer_id))
				->with('customer_country', $customer_countryName)
				->with('customer_addressLine2', $customer_addressLine2)
				->with('customer_phoneNumber', $customer_phoneNumber);
		}
	}

    /**
     * Show the official website's customer registration page.
     */
	public function get_new(){

		$customer_types = array('' => 'Select One','Buyer'=>'Buyer','Vendor'=>'Vendor');

		$countries = array('' => 'Select One') + 
			Country::lists('country_name', 'country_id');

		$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
			'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
			'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
			'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

		$this->layout->content = View::make('frontend.customers.new')
			->with('title', 'Register Customer')
			->with('customer_type',$customer_types)
			->with('customer_countryId', $countries)
			->with('customer_title', $titles);
	}

    /**
     * Validate, create and login the customer and send the customer registration email.
     */
	public function post_create(){
	
		$dob = str_replace("/", "-", Input::get('customer_dateOfBirth'));
		$date_dob = new DateTime($dob);
		$formatted_dob = date_format($date_dob, 'Y-m-d H:i:s');

		$now = new DateTime();

		$validation = Customer::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('newcustomer')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {

		 	$customer_title = Input::get('customer_title');
			$customer_firstName = Input::get('customer_firstName');		
			$customer_lastName = Input::get('customer_lastName');	 
			$customer_emailAddress = Input::get('customer_emailAddress');	
			$customer_username = Input::get('customer_username');	
			$customer_password = Input::get('customer_password');	
			$customer_type = Input::get('customer_type');	
			$customer_idCardNumber = Input::get('customer_idCardNumber');	
			$customer_dateOfBirth = Input::get('customer_dateOfBirth');	
			$customer_addressLine1 = Input::get('customer_addressLine1');	
			$customer_addressLine2 = Input::get('customer_addressLine2');	
			$customer_countryId = Input::get('customer_countryId');
			$customer_countryName = Country::find($customer_countryId)->country_name;
			$customer_phoneNumber = Input::get('customer_phoneNumber');	
			$customer_mobileNumber = Input::get('customer_mobileNumber');	

		 	$data = array(
				'customer_title'=>$customer_title,
				'customer_firstName'=>$customer_firstName,
				'customer_lastName'=>$customer_lastName,
				'customer_emailAddress'=>$customer_emailAddress,
				'customer_username'=>$customer_username,
				'customer_password'=>Hash::make($customer_password),
				'customer_type'=>$customer_type,
				'customer_idCardNumber'=>$customer_idCardNumber,
				'customer_dateOfBirth'=>$formatted_dob,
				'customer_addressLine1'=>$customer_addressLine1,
				'customer_addressLine2'=>$customer_addressLine2,
				'customer_countryId'=>$customer_countryId,
				'customer_phoneNumber'=>$customer_phoneNumber,
				'customer_mobileNumber'=>$customer_mobileNumber,
				'customer_isActive'=>'1',
				'customer_isDeleted'=>'0'
			);

			Customer::create($data);

		 	$emaildata = array(
				'customer_title'=>$customer_title,
				'customer_firstName'=>$customer_firstName,
				'customer_lastName'=>$customer_lastName,
				'customer_emailAddress'=>$customer_emailAddress,
				'customer_username'=>$customer_username,
				'customer_password'=>$customer_password,
				'customer_type'=>$customer_type,
				'customer_idCardNumber'=>$customer_idCardNumber,
				'customer_dateOfBirth'=>$customer_dateOfBirth,
				'customer_addressLine1'=>$customer_addressLine1,
				'customer_addressLine2'=>$customer_addressLine2,
				'customer_countryName'=>$customer_countryName,
				'customer_phoneNumber'=>$customer_phoneNumber,
				'customer_mobileNumber'=>$customer_mobileNumber
			);

			Mail::send('frontend.customers.mails.welcome', $emaildata, function($message) use ($customer_title,
				$customer_firstName, $customer_lastName, $customer_emailAddress, $customer_username,
				$customer_password, $customer_type, $customer_idCardNumber, $customer_dateOfBirth,
				$customer_addressLine1, $customer_addressLine2, $customer_countryName, $customer_phoneNumber,
				$customer_mobileNumber){
   			 	$message->to($customer_emailAddress, $customer_firstName.' '.$customer_lastName)
   			 								  ->subject('Your Registration with Best Property Malta');
   			});

   			$customerdata = array(
				'customer_emailAddress' => Input::get('customer_emailAddress'),
				'password' => Input::get('customer_password')
			);

			if (Auth::attempt($customerdata)) {
				$session_customer_id = Auth::user()->customer_id;
   				return Redirect::route('customer_profile')
   					->with('message', 'You have successfully registered!');
   			}
		}
	}

    /**
     * Show the official website's customer modification page.
     */
	public function get_edit(){
		if (Auth::check()){
			$customer_id = Auth::user()->customer_id;

			$customer_types = array('' => 'Select One','Buyer'=>'Buyer','Vendor'=>'Vendor');

			$countries = array('' => 'Select One') + 
				Country::lists('country_name', 'country_id');

			$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
				'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
				'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
				'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

			$this->layout->content = View::make('frontend.customers.edit')
				->with('title', 'Edit Customer')
				->with('customer', Customer::find($customer_id))
				->with('customer_type',$customer_types)
				->with('customer_countryId', $countries)
				->with('customer_title', $titles);
		}
	}

    /**
     * Validate and update the customer.
     */
	public function put_update(){
		$customer_id = Input::get('customer_id');

		$dob = str_replace("/", "-", Input::get('customer_dateOfBirth'));
		$formatted_dob = date_format(new DateTime($dob), 'Y-m-d H:i:s');
		$now = new DateTime();

		$validation = Customer::validate_edit($customer_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_customer_profile')
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
				'customer_isActive'=>'1',
				'customer_isDeleted'=>'0'
			));

			return Redirect::route('customer_profile')
				->with('message', 'The customer was updated successfully!');
		}
	}

    /**
     * Show the official website's customer password modification page.
     */
	public function get_changepassword(){
		if (Auth::check()){
			$customer_id = Auth::user()->customer_id;
			
			$this->layout->content = View::make('frontend.customers.changepassword')
				->with('title', 'Change Password')
				->with('customer', Customer::find($customer_id));
		}
	}

    /**
     * Validate and update the customer password.
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

				return Redirect::route('customer_profile')
					->with('message', 'The password was updated successfully!');
			}

			else {
				return Redirect::route('change_customer_profile_password')
		 			->with('error-message', 'The old password inputted is not correct!');
			}
		}
	}
}