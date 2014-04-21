<?php

//Official Website Offer Controller Class

class FrontEndOffersController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Buyer: Show the official website's offer creation page.
     */
	public function get_new($propertyId){

		$property = Property::find($propertyId);		

		if(Auth::check() && Auth::user()->getType() == 'Buyer' && $property->property_statusId == Property::getForSaleId()){
			$offer_properties = Property::where('property_isDeleted', '0')
						  ->where('property_id', $propertyId)
						  ->get()->lists('property_name', 'property_id');

			$offer_buyers = Customer::where('customer_type', 'Buyer')
						->where('customer_isDeleted', '0')
						->where('customer_id', Auth::user()->getCustomerId()) 	
						->get()->lists('fe_full_name', 'customer_id');

			$offer_statuses = Offer_Status::where('offer_status_name', 'Awaiting Approval')
						->lists('offer_status_name', 'offer_status_id');
	 
			$offer_price = Property::find($propertyId)->property_price;

			$this->layout->content = View::make('frontend.offers.new')
				->with('title', 'Add New Offer')
				->with('offer_propertyId',$propertyId)
				->with('offer_property',$offer_properties)
				->with('offer_buyer', $offer_buyers)
				->with('offer_price', $offer_price)
				->with('offer_status', $offer_statuses);
		}
		else{
			return Redirect::route('webproperties')
				->with('error-message', 'You cannot make a new offer for the chosen property!');
		}
	}

    /**
     * Buyer: Validate, create the offer and send the required emails.
     */
	public function post_create(){
		
		$validation = Offer::validate_create();

		if($validation->fails()) {
		 	return Redirect::back()
		 		->withErrors($validation)
		 		->withInput();
		}

		else {
			if(Input::get('offer_value') >= Input::get('offer_price')){

				Offer::create(array(
					'offer_value'=>Input::get('offer_value'),
					'offer_propertyId'=>Input::get('offer_propertyId'),
					'offer_buyerId'=>Input::get('offer_buyerId'),
					'offer_statusId'=>Input::get('offer_statusId'),
					'offer_isDeleted'=>'0'
				));

				$other_offers = DB::table('offers')
						->where('offer_propertyId', Input::get('offer_propertyId'))
						->where('offer_isDeleted', '0')
						->where('offer_buyerId', Input::get('offer_buyerId'))	
						->where('offer_statusId', Offer::getRejectedId())->get();

				if($other_offers!=null)
				{
					foreach ($other_offers as $other_offer) {
						$otherofferId = $other_offer->offer_id;
						Offer::find($otherofferId)->update(array(
							'offer_statusId'=> Offer::getCancelledId(),
							'offer_isDeleted'=>'1'
						));
					}
				}

				$property_name = Property::find(Input::get('offer_propertyId'))->property_name;
				$property_status = Property::find(Input::get('offer_propertyId'))->property_statusId;
				$property_status_name = Property_Status::find($property_status)->property_status_name;
				$vendor_id = Property::find(Input::get('offer_propertyId'))->property_vendorId;
				$property_vendor = Customer::find($vendor_id)->getName();
				$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
				$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
				$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
				$offer_value = Input::get('offer_value');
				$offer_status = Offer_Status::find(Input::get('offer_statusId'))->offer_status_name;
				$property_buyer = Customer::find(Input::get('offer_buyerId'))->getName();
				$buyer_firstName = Customer::find(Input::get('offer_buyerId'))->customer_firstName;
				$buyer_lastName = Customer::find(Input::get('offer_buyerId'))->customer_lastName;
				$buyer_emailAddress = Customer::find(Input::get('offer_buyerId'))->customer_emailAddress;				

				$buyeremaildata = array(
					'property_name'=>$property_name,
					'property_status_name'=>$property_status_name,
					'property_vendor'=>$property_vendor,
					'offer_value'=>$offer_value,
					'offer_status'=>$offer_status,
					'buyer_firstName'=>$buyer_firstName,
					'buyer_lastName'=>$buyer_lastName,
					'buyer_emailAddress'=>$buyer_emailAddress
				);

				Mail::send('frontend.offers.mails.buyer_new_offer', $buyeremaildata, function($message) use (
					$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status, 
					$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
	   			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
	   			 								  ->subject('New Offer for Property '.$property_name);
	   			});

				$vendoremaildata = array(
					'property_name'=>$property_name,
					'property_status_name'=>$property_status_name,
					'property_buyer'=>$property_buyer,
					'offer_value'=>$offer_value,
					'offer_status'=>$offer_status,
					'vendor_firstName'=>$vendor_firstName,
					'vendor_lastName'=>$vendor_lastName,
					'vendor_emailAddress'=>$vendor_emailAddress
				);

				Mail::send('frontend.offers.mails.vendor_new_offer', $vendoremaildata, function($message) use (
					$property_status_name, $property_name, $property_buyer, $offer_value, $offer_status, 
					$vendor_firstName,$vendor_lastName, $vendor_emailAddress){
	   			 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			 								  ->subject('New Offer for Property '.$property_name);
	   			});

				return Redirect::route('webproperty', Input::get('offer_propertyId'))
					->with('message', 'The offer was created successfully. The vendor will be notified accordingly.');
			}
			else
				return Redirect::back()
					->with('error-message', 'The offer value must be greater or equal to the original price!');
		}
	}

    /**
     * Buyer: Show the official website's offer modification page.
     */
	public function get_edit($offer_id){

		$offer = Offer::find($offer_id);

		if($offer != null){

			$offer_isDeleted = Offer::find($offer_id)->offer_isDeleted;
			$offer_propertyId = Offer::find($offer_id)->offer_propertyId;
			$offer_price = Property::find($offer_propertyId)->property_price;

			$offer_buyerId = Offer::find($offer_id)->offer_buyerId;
			$offer_statusId = Offer::find($offer_id)->offer_statusId;

			$offer_properties = Property::where('property_isDeleted', '0')
				  ->where('property_id', $offer_propertyId)
				  ->get()->lists('property_name', 'property_id');

			$offer_buyers = Customer::where('customer_type', 'Buyer')
				  ->where('customer_isDeleted', '0')
				  ->where('customer_id', $offer_buyerId)		
				  ->get()->lists('fe_full_name', 'customer_id');

			$offer_statuses = Offer_Status::where('offer_status_name', 'Awaiting Approval')
				  ->lists('offer_status_name', 'offer_status_id');

			if(Auth::check() && Auth::user()->getType() == 'Buyer' && 
						!$offer_isDeleted && $offer_buyerId == Auth::user()->getCustomerId() &&
						$offer_statusId == Offer::getAwaitingApprovalId()){

				$this->layout->content = View::make('frontend.offers.edit')
					->with('title', 'Edit Offer')
					->with('offer_price', $offer_price)
					->with('offer', Offer::find($offer_id))
					->with('offer_buyer', $offer_buyers)
					->with('offer_property',$offer_properties)
					->with('offer_price', $offer_price)
					->with('offer_status', $offer_statuses);
			}

			else
			{
				return Redirect::route('webproperties')
					->with('error-message', 'You cannot edit the requested offer!');
			}
		}
		else
		{
			return Redirect::route('webproperties')
				->with('error-message', 'You cannot edit the requested offer!');
		}
	}

    /**
     * Buyer: Validate, edit the offer and send the required emails.
     */
	public function put_update(){
		$offer_id = Input::get('offer_id');

		$validation = Offer::validate_edit();

		if($validation->fails()) {
		 	return Redirect::back()
		 		->withErrors($validation)
		 		->withInput();
		}

		else {
			if(Input::get('offer_value') >= Input::get('offer_price')){
				Offer::find($offer_id)->update(array(
					'offer_value'=>Input::get('offer_value'),
					'offer_propertyId'=>Input::get('offer_propertyId'),
					'offer_buyerId'=>Input::get('offer_buyerId'),
					'offer_statusId'=>Input::get('offer_statusId'),
					'offer_isDeleted'=>'0'
				));


				$property_name = Property::find(Input::get('offer_propertyId'))->property_name;
				$property_status = Property::find(Input::get('offer_propertyId'))->property_statusId;
				$property_status_name = Property_Status::find($property_status)->property_status_name;
				$vendor_id = Property::find(Input::get('offer_propertyId'))->property_vendorId;
				$property_vendor = Customer::find($vendor_id)->getName();
				$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
				$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
				$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
				$offer_value = Input::get('offer_value');
				$offer_status = Offer_Status::find(Input::get('offer_statusId'))->offer_status_name;
				$property_buyer = Customer::find(Input::get('offer_buyerId'))->getName();
				$buyer_firstName = Customer::find(Input::get('offer_buyerId'))->customer_firstName;
				$buyer_lastName = Customer::find(Input::get('offer_buyerId'))->customer_lastName;
				$buyer_emailAddress = Customer::find(Input::get('offer_buyerId'))->customer_emailAddress;				

				$buyeremaildata = array(
					'property_name'=>$property_name,
					'property_status_name'=>$property_status_name,
					'property_vendor'=>$property_vendor,
					'offer_value'=>$offer_value,
					'offer_status'=>$offer_status,
					'buyer_firstName'=>$buyer_firstName,
					'buyer_lastName'=>$buyer_lastName,
					'buyer_emailAddress'=>$buyer_emailAddress
				);

				Mail::send('frontend.offers.mails.buyer_updated_offer', $buyeremaildata, function($message) use (
					$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status, 
					$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
	   			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
	   			 								  ->subject('Updated Offer for Property '.$property_name);
	   			});

				$vendoremaildata = array(
					'property_name'=>$property_name,
					'property_status_name'=>$property_status_name,
					'property_buyer'=>$property_buyer,
					'offer_value'=>$offer_value,
					'offer_status'=>$offer_status,
					'vendor_firstName'=>$vendor_firstName,
					'vendor_lastName'=>$vendor_lastName,
					'vendor_emailAddress'=>$vendor_emailAddress
				);

				Mail::send('frontend.offers.mails.vendor_updated_offer', $vendoremaildata, function($message) use (
					$property_status_name, $property_name, $property_buyer, $offer_value, $offer_status, 
					$vendor_firstName, $vendor_lastName, $vendor_emailAddress){
	   			 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			 								  ->subject('Updated Offer for Property '.$property_name);
	   			});


				return Redirect::route('webproperty', Input::get('offer_propertyId'))
					->with('message', 'The offer was updated successfully!');
			}
			else
				return Redirect::back()
					->with('error-message', 'The offer value must be greater or equal to the original price!');
		}
	}

    /**
     * Vendor: Reject the offer and send the required emails.
     */
	public function put_reject(){
		$offer =  Offer::find(Input::get('offer_id'));
		$offer_propertyId = $offer->offer_propertyId;

		$offer->update(array(
			'offer_statusId'=>Offer::getRejectedId()
		));

		$updatedoffer =  Offer::find(Input::get('offer_id'));

		$property_name = Property::find($offer_propertyId)->property_name;
		$property_status = Property::find($offer_propertyId)->property_statusId;
		$property_status_name = Property_Status::find($property_status)->property_status_name;
		$vendor_id = Property::find($offer_propertyId)->property_vendorId;
		$property_vendor = Customer::find($vendor_id)->getName();
		$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
		$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
		$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
		$offer_value = $updatedoffer->offer_value;
		$offer_status = $updatedoffer->offer_statusId;
		$offer_status_name = Offer_Status::find($offer_status)->offer_status_name;
		$property_buyer = $updatedoffer->offer_buyerId;
		$property_buyer_name = Customer::find($property_buyer)->getName();
		$buyer_firstName = Customer::find($property_buyer)->customer_firstName;
		$buyer_lastName = Customer::find($property_buyer)->customer_lastName;
		$buyer_emailAddress = Customer::find($property_buyer)->customer_emailAddress;				

		$buyeremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_vendor'=>$property_vendor,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'buyer_firstName'=>$buyer_firstName,
			'buyer_lastName'=>$buyer_lastName,
			'buyer_emailAddress'=>$buyer_emailAddress
		);

		Mail::send('frontend.offers.mails.buyer_reject_offer', $buyeremaildata, function($message) use (
			$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status_name, 
			$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
  			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
				  ->subject('Rejected Offer for Property '.$property_name);
		});

		$vendoremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_buyer_name'=>$property_buyer_name,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'vendor_firstName'=>$vendor_firstName,
			'vendor_lastName'=>$vendor_lastName,
			'vendor_emailAddress'=>$vendor_emailAddress
		);

		Mail::send('frontend.offers.mails.vendor_reject_offer', $vendoremaildata, function($message) use (
			$property_status_name, $property_name, $property_buyer_name, $offer_value, $offer_status_name, 
			$vendor_firstName,$vendor_lastName, $vendor_emailAddress){
	   	 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			  ->subject('Rejected Offer for Property '.$property_name);
	   	});

		return Redirect::route('webproperty', $offer_propertyId)
			->with('message', 'The offer was successfully rejected. The buyer will be notified accordingly.');
	}

    /**
     * Vendor: Confirm the offer and send the required emails.
     */
	public function put_confirm(){
		$offer =  Offer::find(Input::get('offer_id'));
		$offer_propertyId = $offer->offer_propertyId;

		$offer->update(array(
			'offer_statusId'=>Offer::getConfirmedId()
		));

		$property = DB::table('properties')
			->where('property_id', $offer_propertyId)
			->where('property_isDeleted', '0')->get();

		if($property!=null)
		{
			Property::find($offer_propertyId)->update(array(
				'property_statusId'=>Property::getSoldId(),
				'property_price'=>$offer->offer_value
			));
		}

		$updatedoffer =  Offer::find(Input::get('offer_id'));

		$property_name = Property::find($offer_propertyId)->property_name;
		$property_status = Property::find($offer_propertyId)->property_statusId;
		$property_status_name = Property_Status::find($property_status)->property_status_name;
		$vendor_id = Property::find($offer_propertyId)->property_vendorId;
		$property_vendor = Customer::find($vendor_id)->getName();
		$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
		$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
		$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
		$offer_value = $updatedoffer->offer_value;
		$offer_status = $updatedoffer->offer_statusId;
		$offer_status_name = Offer_Status::find($offer_status)->offer_status_name;
		$property_buyer = $updatedoffer->offer_buyerId;
		$property_buyer_name = Customer::find($property_buyer)->getName();
		$buyer_firstName = Customer::find($property_buyer)->customer_firstName;
		$buyer_lastName = Customer::find($property_buyer)->customer_lastName;
		$buyer_emailAddress = Customer::find($property_buyer)->customer_emailAddress;				

		$buyeremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_vendor'=>$property_vendor,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'buyer_firstName'=>$buyer_firstName,
			'buyer_lastName'=>$buyer_lastName,
			'buyer_emailAddress'=>$buyer_emailAddress
		);

		Mail::send('frontend.offers.mails.buyer_confirm_offer', $buyeremaildata, function($message) use (
			$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status_name, 
			$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
  			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
				  ->subject('Confirmed Sale of Property '.$property_name);
		});

		$vendoremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_buyer_name'=>$property_buyer_name,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'vendor_firstName'=>$vendor_firstName,
			'vendor_lastName'=>$vendor_lastName,
			'vendor_emailAddress'=>$vendor_emailAddress
		);

		Mail::send('frontend.offers.mails.vendor_confirm_offer', $vendoremaildata, function($message) use (
			$property_status_name, $property_name, $property_buyer_name, $offer_value, $offer_status_name, 
			$vendor_firstName,$vendor_lastName, $vendor_emailAddress){
	   	 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			  ->subject('Confirmed Sale of Property '.$property_name);
	   	});

		return Redirect::route('webproperty', $offer_propertyId)
			->with('message', 'The sale was successfully confirmed. The buyer will be notified accordingly.');
	}

    /**
     * Vendor: Accept the offer and send the required emails.
     */
	public function put_accept(){
		$offer =  Offer::find(Input::get('offer_id'));
		$offerId = $offer->offer_id;
		$offer_propertyId = $offer->offer_propertyId;

		$offer->update(array(
			'offer_statusId'=>Offer::getAcceptedId()
		));

		$property = DB::table('properties')
			->where('property_id', $offer_propertyId)
			->where('property_isDeleted', '0')->get();

		if($property!=null)
		{
			Property::find($offer_propertyId)->update(array(
				'property_statusId'=>Property::getSoldSTCId()
			));
		}

		$otheroffers = DB::table('offers')
			->where('offer_id', '!=', $offerId)
			->where('offer_propertyId', $offer_propertyId)
			->where('offer_isDeleted', '0')->get();

		if($otheroffers!=null)
		{
			foreach ($otheroffers as $otheroffer) {
				$otherofferId = $otheroffer->offer_id;

				Offer::find($otherofferId)->update(array(
					'offer_statusId'=>Offer::getCancelledId(),
					'offer_isDeleted'=>'1'
				));
			}
		}

		$propertyinterests = DB::table('interests')
			->where('interest_propertyId', $offer_propertyId)->get();

		if($propertyinterests!=null)
		{
			foreach ($propertyinterests as $interest) {
				$interestId = $interest->interest_id;
				Interest::find($interestId)->delete();
			}
		}

		$updatedoffer =  Offer::find(Input::get('offer_id'));

		$property_name = Property::find($offer_propertyId)->property_name;
		$property_status = Property::find($offer_propertyId)->property_statusId;
		$property_status_name = Property_Status::find($property_status)->property_status_name;
		$vendor_id = Property::find($offer_propertyId)->property_vendorId;
		$property_vendor = Customer::find($vendor_id)->getName();
		$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
		$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
		$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
		$offer_value = $updatedoffer->offer_value;
		$offer_status = $updatedoffer->offer_statusId;
		$offer_status_name = Offer_Status::find($offer_status)->offer_status_name;
		$property_buyer = $updatedoffer->offer_buyerId;
		$property_buyer_name = Customer::find($property_buyer)->getName();
		$buyer_firstName = Customer::find($property_buyer)->customer_firstName;
		$buyer_lastName = Customer::find($property_buyer)->customer_lastName;
		$buyer_emailAddress = Customer::find($property_buyer)->customer_emailAddress;				

		$buyeremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_vendor'=>$property_vendor,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'buyer_firstName'=>$buyer_firstName,
			'buyer_lastName'=>$buyer_lastName,
			'buyer_emailAddress'=>$buyer_emailAddress
		);

		Mail::send('frontend.offers.mails.buyer_accept_offer', $buyeremaildata, function($message) use (
			$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status_name, 
			$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
  			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
				  ->subject('Accepted Offer for Property '.$property_name);
		});

		$vendoremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_buyer_name'=>$property_buyer_name,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'vendor_firstName'=>$vendor_firstName,
			'vendor_lastName'=>$vendor_lastName,
			'vendor_emailAddress'=>$vendor_emailAddress
		);

		Mail::send('frontend.offers.mails.vendor_accept_offer', $vendoremaildata, function($message) use (
			$property_status_name, $property_name, $property_buyer_name, $offer_value, $offer_status_name, 
			$vendor_firstName,$vendor_lastName, $vendor_emailAddress){
	   	 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			  ->subject('Accepted Offer for Property '.$property_name);
	   	});

		return Redirect::route('webproperty', $offer_propertyId)
			->with('message', 'The offer was successfully accepted. The buyer will be notified accordingly.');
	}

    /**
     * Buyer: Cancel the offer and send the required emails.
     */
	public function delete_destroy(){
		$offer =  Offer::find(Input::get('offer_id'));
		$offer_propertyId = $offer->offer_propertyId;

		Offer::find(Input::get('offer_id'))->update(array(
				'offer_statusId'=>Offer::getCancelledId(),
				'offer_isDeleted'=>'1'
		));

		$updatedoffer =  Offer::find(Input::get('offer_id'));

		$property_name = Property::find($offer_propertyId)->property_name;
		$property_status = Property::find($offer_propertyId)->property_statusId;
		$property_status_name = Property_Status::find($property_status)->property_status_name;
		$vendor_id = Property::find($offer_propertyId)->property_vendorId;
		$property_vendor = Customer::find($vendor_id)->getName();
		$vendor_firstName = Customer::find($vendor_id)->customer_firstName;
		$vendor_lastName = Customer::find($vendor_id)->customer_lastName;
		$vendor_emailAddress = Customer::find($vendor_id)->customer_emailAddress;
		$offer_value = $updatedoffer->offer_value;
		$offer_status = $updatedoffer->offer_statusId;
		$offer_status_name = Offer_Status::find($offer_status)->offer_status_name;
		$property_buyer = $updatedoffer->offer_buyerId;
		$property_buyer_name = Customer::find($property_buyer)->getName();
		$buyer_firstName = Customer::find($property_buyer)->customer_firstName;
		$buyer_lastName = Customer::find($property_buyer)->customer_lastName;
		$buyer_emailAddress = Customer::find($property_buyer)->customer_emailAddress;				

		$buyeremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_vendor'=>$property_vendor,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'buyer_firstName'=>$buyer_firstName,
			'buyer_lastName'=>$buyer_lastName,
			'buyer_emailAddress'=>$buyer_emailAddress
		);

		Mail::send('frontend.offers.mails.buyer_cancel_offer', $buyeremaildata, function($message) use (
			$property_status_name, $property_name, $property_vendor, $offer_value, $offer_status_name, 
			$buyer_firstName, $buyer_lastName, $buyer_emailAddress){
  			 	$message->to($buyer_emailAddress, $buyer_firstName.' '.$buyer_lastName)
				  ->subject('Cancelled Offer for Property '.$property_name);
		});

		$vendoremaildata = array(
			'property_name'=>$property_name,
			'property_status_name'=>$property_status_name,
			'property_buyer_name'=>$property_buyer_name,
			'offer_value'=>$offer_value,
			'offer_status_name'=>$offer_status_name,
			'vendor_firstName'=>$vendor_firstName,
			'vendor_lastName'=>$vendor_lastName,
			'vendor_emailAddress'=>$vendor_emailAddress
		);

		Mail::send('frontend.offers.mails.vendor_cancel_offer', $vendoremaildata, function($message) use (
			$property_status_name, $property_name, $property_buyer_name, $offer_value, $offer_status_name, 
			$vendor_firstName,$vendor_lastName, $vendor_emailAddress){
	   	 	$message->to($vendor_emailAddress, $vendor_firstName.' '.$vendor_lastName)
	   			  ->subject('Cancelled Offer for Property '.$property_name);
	   	});


		return Redirect::route('webproperty', $offer_propertyId)
				->with('message', 'The offer was cancelled successfully!');
	}

}