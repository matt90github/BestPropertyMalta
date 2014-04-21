<?php

//Official Website Contact Us Controller Class

class FrontEndContactUsController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Show the official website contact us page.
     */
	public function get_new(){

		$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
			'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
			'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
			'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

		if (Auth::check()){
			$customer_id = Auth::user()->getCustomerId();
			$customer = Customer::find($customer_id);

			$this->layout->content = View::make('frontend.contactus.form')
				->with('title', 'Submit Query')
				->with('customer', $customer);
		}

		else {
			$this->layout->content = View::make('frontend.contactus.form')
				->with('title', 'Submit Query')
				->with('customer_title', $titles);
		}

	}

    /**
     * Validate and submit a new query, and send an email.
     */
	public function post_create(){
	
		$create_query_rules = array(
		 	'customer_title'=>'Required',
		 	'customer_firstName'=>'Required|Min:2',
		 	'customer_lastName'=>'Required|Min:2',
		 	'customer_emailAddress'=>'Required|Min:6|Email',
		 	'contactus_query'=>'Required|Min:20'
		);

		$validation = Validator::make(Input::all(), $create_query_rules);

		 if($validation->fails()) {
		 	return Redirect::route('newquery')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {

		 	$customer_title = Input::get('customer_title');
		 	$customer_firstName = Input::get('customer_firstName');
		 	$customer_lastName = Input::get('customer_lastName');
		 	$customer_emailAddress = Input::get('customer_emailAddress');
		 	$contactus_query = Input::get('contactus_query');
		 	$customer_registered = 'Not Registered';

			if (Auth::check())
				$customer_registered = 'Registered';

		 	$data = array(
				'customer_title'=>$customer_title,
			 	'customer_firstName'=>$customer_firstName, 
				'customer_lastName'=>$customer_lastName,
				'customer_emailAddress'=>$customer_emailAddress,
				'customer_registered'=>$customer_registered,
				'contactus_query'=>$contactus_query);

			Mail::send('frontend.contactus.mails.query', $data,
				
				function($message) use ($customer_title, $customer_firstName, $customer_lastName, 
										$customer_emailAddress, $customer_registered, $contactus_query) {

   			 		$message->to('mattsacctest@gmail.com', Input::get('customer_firstName').' '.Input::get('customer_lastName'))->subject('Best Property Malta - New Query by '.
   			 						$customer_title.' '.$customer_firstName.' '.$customer_lastName);
   			  	}
   			 );
	   		
	   		return Redirect::route('home')
	   			->with('message', 'Your query was successfully submitted to Best Property Malta!');
		}
	}
}