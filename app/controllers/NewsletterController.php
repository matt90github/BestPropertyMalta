<?php

//Email Newsletter Controller Class

class NewsletterController extends BaseController {

    //Enable restful feature
	public $restful = true;

    /**
     * Send the newsletter to all active customers.
     */
	public function post_create(){

		$latestproperties = DB::table('properties')
			->where('property_isDeleted', '!=', '1')
			->where('property_isActive', '1')
			->where('property_statusId', Property::getForSaleId())
			->orderBy('property_id','desc')->take(10)->get();

		$activecustomers = DB::table('customers')->where('customer_isDeleted', '!=', '1')
												 ->orderBy('customer_firstName')->get();		

		$alllocations = DB::table('locations')->orderBy('location_name')->get();
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();

		if($activecustomers!=null) {

        	foreach($activecustomers as $customer) {
				
				$customer_firstName = $customer->customer_firstName;
				$customer_lastName = $customer->customer_lastName;
				$customer_emailAddress = $customer->customer_emailAddress;

				$emaildata = array(
					'latestproperties'=>$latestproperties,
					'propertylocations'=>$alllocations,
					'propertystatuses'=>$allpropertystatuses,
					'propertytypes'=>$allpropertytypes,
					'customer_firstName'=>$customer_firstName,
					'customer_lastName'=>$customer_lastName,
					'customer_emailAddress'=>$customer_emailAddress
				);

				Mail::queue('newsletter.email', $emaildata, function($message) 
					use ($latestproperties, $alllocations, $allpropertystatuses, $allpropertytypes, 
						$customer, $customer_firstName, $customer_lastName, $customer_emailAddress){
			   	 	$message->to($customer_emailAddress, $customer_firstName.' '.$customer_lastName)
			   	     		->subject('Weekly Email Newsletter');
			   	});
			}

		   	return Redirect::route('imshome')
				->with('message', 'The newsletter was successfully sent!');
		}

		else
		   	return Redirect::route('imshome')
				->with('error-message', 'No customers are currently available!');
	}
}