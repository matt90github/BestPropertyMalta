<?php

//IMS Offer Controller Class

class OffersController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's active offer index page.
     */
	public function get_index(){
		$alloffers = DB::table('offers')
					->where('offer_isDeleted', '!=', '1')
					->orderBy('created_at', 'desc')
					->paginate(10);

		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')->orderBy('property_name')->get();
		$allofferstatuses = DB::table('offer_statuses')->orderBy('offer_status_name')->get();
		$allbuyers = DB::table('customers')->where('customer_type', 'Buyer')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('offers.index')
			->with('title', 'List of Offers')
			->with('offers', $alloffers)
			->with('properties', $allproperties)
			->with('offerstatuses', $allofferstatuses)
			->with('buyers', $allbuyers);
	}

    /**
     * Show the IMS's cancelled offer index page.
     */
	public function get_cancelledindex(){
		$alloffers = DB::table('offers')
					->where('offer_isDeleted', '1')
					->orderBy('created_at', 'desc')
					->paginate(10);

		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')->orderBy('property_name')->paginate(10);
		$allofferstatuses = DB::table('offer_statuses')->orderBy('offer_status_name')->get();
		$allbuyers = DB::table('customers')->where('customer_type', 'Buyer')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('offers.cancelledindex')
			->with('title', 'List of Offers')
			->with('offers', $alloffers)
			->with('properties', $allproperties)
			->with('offerstatuses', $allofferstatuses)
			->with('buyers', $allbuyers);
	}

    /**
     * Show the IMS's active offer details page.
     */
	public function get_view($offer_id){

		if (Offer::find($offer_id) != null && !Offer::find($offer_id)->offer_isDeleted) {

			$offer_propertyId = Offer::find($offer_id)->offer_propertyId;
			$offer_propertyName = Property::find($offer_propertyId)->property_name;

			$offer_buyerId = Offer::find($offer_id)->offer_buyerId;
			$offer_buyerName = Customer::find($offer_buyerId)->customer_firstName.' '.Customer::find($offer_buyerId)->customer_lastName;

			$offer_statusId = Offer::find($offer_id)->offer_statusId;
			$offer_statusName = Offer_Status::find($offer_statusId)->offer_status_name;

			$offer_isDeleted = Offer::find($offer_id)->offer_isDeleted;
			$offer_deleted = 'No';

			if($offer_isDeleted==1)
				$offer_deleted = 'Yes';

			$this->layout->content = View::make('offers.view')
				->with('title', 'Offer View Page')
				->with('offer', Offer::find($offer_id))
				->with('offer_property', $offer_propertyName)
				->with('offer_buyer', $offer_buyerName)
				->with('offer_status', $offer_statusName)
				->with('offer_deleted', $offer_deleted);
		}

		else
			return Redirect::route('offers')
				->with('error-message', 'Requested Offer was not found');
	}

    /**
     * Show the IMS's offer creation page.
     */
	public function get_new(){

		$offer_properties = array('' => 'Select One') + 
			Property::where('property_isDeleted', '0')
					->where('property_statusId', Property::getForSaleId())
					->get()->lists('full_name', 'property_id');

		$offer_buyers = array('' => 'Select One') + 
			Customer::where('customer_type', 'Buyer')
					->where('customer_isDeleted', '0')
					->get()->lists('full_name', 'customer_id');

		$offer_statuses = array('' => 'Select One') + 
			Offer_Status::lists('offer_status_name', 'offer_status_id');

		$this->layout->content = View::make('offers.new')
			->with('title', 'Add New Offer')
			->with('offer_property',$offer_properties)
			->with('offer_buyer', $offer_buyers)
			->with('offer_status', $offer_statuses);
	}

    /**
     * Validate and create the offer.
     */
	public function post_create(){

		$validation = Offer::validate_create();

		if($validation->fails()) {
		 	return Redirect::route('new_offer')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {
			Offer::create(array(
				'offer_value'=>Input::get('offer_value'),
				'offer_propertyId'=>Input::get('offer_propertyId'),
				'offer_buyerId'=>Input::get('offer_buyerId'),
				'offer_statusId'=>Input::get('offer_statusId'),
				'offer_isDeleted'=>'0'
			));

			return Redirect::route('offers')
				->with('message', 'The offer was created successfully!');
		}
	}

    /**
     * Show the IMS's offer modification page.
     */
	public function get_edit($offer_id){

		if(Offer::find($offer_id) != null){

			$offer_properties = array('' => 'Select One') + 
				Property::where('property_isDeleted', '0')
						->get()->lists('full_name', 'property_id');

			$offer_buyers = array('' => 'Select One') + 
				Customer::where('customer_type', 'Buyer')
						->where('customer_isDeleted', '0')
						->get()->lists('full_name', 'customer_id');

			$offer_statuses = array('' => 'Select One') + 
				Offer_Status::lists('offer_status_name', 'offer_status_id');

			$this->layout->content = View::make('offers.edit')
				->with('title', 'Edit Offer')
				->with('offer', Offer::find($offer_id))
				->with('offer_property',$offer_properties)
				->with('offer_buyer', $offer_buyers)
				->with('offer_status', $offer_statuses);
		}
		else
			return Redirect::route('offers')
				->with('error-message', 'Requested Offer was not found');
	}

    /**
     * Validate and edit the offer.
     */
	public function put_update(){
		$offer_id = Input::get('offer_id');

		$validation = Offer::validate_edit();

		if($validation->fails()) {
		 	return Redirect::route('edit_offer', $offer_id)
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			Offer::find($offer_id)->update(array(
				'offer_value'=>Input::get('offer_value'),
				'offer_propertyId'=>Input::get('offer_propertyId'),
				'offer_buyerId'=>Input::get('offer_buyerId'),
				'offer_statusId'=>Input::get('offer_statusId'),
				'offer_isDeleted'=>'0'
			));

			return Redirect::route('offer', $offer_id)
				->with('message', 'The offer was updated successfully!');
		}
	}

    /**
     * Show the IMS's offer deletion page.
     */
	public function get_destroy($offer_id){
		$this->layout->content = View::make('offers.confirm-delete')
			->with('title', 'Confirm Offer Deletion')
			->with('offer', Offer::find($offer_id));
	}

    /**
     * Update the offer's status to 'Cancelled'.
     */
	public function delete_destroy(){
		Offer::find(Input::get('offer_id'))->update(array(
				'offer_statusId'=>Offer::getCancelledId(),
				'offer_isDeleted'=>'1'
		));
		return Redirect::route('offers')
				->with('message', 'The offer was deleted successfully!');
	}

}