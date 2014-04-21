<?php

//Official Website Property Controller Class

class FrontEndPropertiesController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Show the official website's property details page.
     */
	public function get_view($property_id){

		$property = Property::find($property_id);

		if ($property != null) {

			$property_typeId = Property::find($property_id)->property_typeId;
			$property_typeName = Property_Type::find($property_typeId)->property_type_name;
			$property_statusId = Property::find($property_id)->property_statusId;
			$property_statusName = Property_Status::find($property_statusId)->property_status_name;
			$property_locationId = Property::find($property_id)->property_locationId;
			$property_locationName = Location::find($property_locationId)->location_name;
			$property_vendorId = Property::find($property_id)->property_vendorId;
			$property_vendorName = Customer::find($property_vendorId)->customer_firstName.' '.
									Customer::find($property_vendorId)->customer_lastName;

			$property_isActive = Property::find($property_id)->property_isActive;

			$property_active = 'No';

			if($property_isActive==1)
				$property_active = 'Yes';

			$property_isDeleted = Property::find($property_id)->property_isDeleted;

			$property_deleted = 'No';

			if($property_isDeleted==1)
				$property_deleted = 'Yes';

			$property_hasGarage = Property::find($property_id)->property_hasGarage;

			$property_garage = 'No';

			if($property_hasGarage==1)
				$property_garage = 'Yes';

			$property_hasGarden = Property::find($property_id)->property_hasGarden;

			$property_garden = 'No';

			if($property_hasGarden==1)
				$property_garden = 'Yes';

			$primaryimages = DB::table('images')->where('image_propertyId', $property_id)
											   ->where('image_isPrimary', '1')->paginate(1);

			$otherimages = DB::table('images')->where('image_propertyId', $property_id)
											    ->where('image_isPrimary', '0')->paginate(100);

			$propertylocation = Property::find($property_id)->property_location;

			if(Auth::check()){
				$offer_available = null;
				$offer_isAvailable = false;
				$offer_made = false;
				$offer_isRejected = false;
				$offer_rejected = null;
				$offer_isAccepted = false;
				$offer_accepted = null;
				$offer_isVendorAccepted = false;
				$offer_vendorAccepted = null;
				$property_isSold = false;
				$property_sold = null;
				$property_isVendorSold = false;
				$property_vendorSold = null;
				$offer_exists = null;
				$offer_list = null;
				$buyer_list = null;
				$acceptedoffer = null;
				$customer_interested = null;
				$isInterested = false;

				$offer_available = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_buyerId', Auth::user()->getCustomerId())
					  ->whereIn('offer_statusId', array(Offer::getAwaitingApprovalId(), 
					  				   Offer::getAcceptedId(), Offer::getRejectedId()))
					  ->get();

				$offer_exists = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_buyerId', Auth::user()->getCustomerId())
					  ->where('offer_statusId', Offer::getAwaitingApprovalId())
					  ->get()->lists('offer_id');

				$offer_rejected = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_buyerId', Auth::user()->getCustomerId())
					  ->where('offer_statusId', Offer::getRejectedId())
					  ->get()->lists('offer_id');

				$offer_accepted = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_buyerId', Auth::user()->getCustomerId())
					  ->where('offer_statusId', Offer::getAcceptedId())
					  ->get()->lists('offer_id');

				$offer_vendorAccepted = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_statusId', Offer::getAcceptedId())
					  ->get()->lists('offer_id');

				$offer_vendorAcceptedOffer = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_statusId', Offer::getAcceptedId())
					  ->get();

				$property_sold = Property::where('property_isDeleted', '0')
					  ->where('property_id', $property_id)
					  ->where('property_statusId', Offer::getConfirmedId())
					  ->get()->lists('property_id');

				$property_vendorSold = Offer::where('offer_isDeleted', '0')
					  ->where('offer_propertyId', $property_id)
					  ->where('offer_statusId', Offer::getConfirmedId())
					  ->get();		

				$customer_interested = Interest::where('interest_customerId', Auth::user()->getCustomerId())
					  ->where('interest_propertyId', $property_id)
					  ->get()->lists('interest_id');	

				if($customer_interested != null)
					$isInterested = true;
				if($offer_available != null)
					$offer_isAvailable = true;
				if($offer_exists != null)
					$offer_made = true;
				if($offer_rejected != null)
					$offer_isRejected = true;
				if($offer_accepted != null)
					$offer_isAccepted = true;
				if($property_sold != null)
					$property_isSold = true;
				if($property_vendorSold != null)
					$property_isVendorSold = true;
				if($offer_vendorAccepted != null)
					$offer_isVendorAccepted = true;

				if(!$offer_isVendorAccepted){
					$offer_list = DB::table('offers')
						->where('offer_isDeleted', '!=', '1')
						->where('offer_statusId', Offer::getAwaitingApprovalId())
						->where('offer_propertyId', $property_id)
						->orderBy('created_at')->paginate(20);
				}
				else{
					$offer_list = $offer_vendorAcceptedOffer;
				}

				$buyer_list = DB::table('customers')
						->where('customer_isDeleted', '!=', '1')
						->where('customer_type', 'Buyer')
						->orderBy('created_at')->get();

				if($property->property_isActive == '1')
					$this->layout->content = View::make('frontend.properties.view')
						->with('property', $property)
						->with('offers', $offer_list)
						->with('buyers', $buyer_list)
						->with('primaryimages', $primaryimages)
						->with('propertyimages', $otherimages)
						->with('property_type', $property_typeName)
						->with('property_status', $property_statusName)
						->with('property_vendor', $property_vendorName)
						->with('property_vendorId', $property_vendorId)
						->with('property_location', $property_locationName)
						->with('property_hasGarage', $property_garage)
						->with('property_hasGarden', $property_garden)
						->with('property_offerMade', $offer_made)
						->with('property_offer', $offer_exists)
						->with('property_mainoffer', $offer_available)
						->with('property_offerAvailable', $offer_isAvailable)
						->with('property_offerRejected', $offer_isRejected)
						->with('property_offerAccepted', $offer_isAccepted)
						->with('property_offerVendorAccepted', $offer_isVendorAccepted)
						->with('property_offersold', $property_sold)
						->with('property_sold', $property_isSold)
						->with('property_vendorSold', $property_isVendorSold)
						->with('property_vendorOffer', $property_vendorSold)
						->with('property_interested', $isInterested)
						->with('property_active', $property_active)
						->with('property_deleted', $property_deleted);

				else
					return Redirect::route('webproperties')
						->with('error-message', 'Requested Property was not found');
			}

			else{
				if($property->property_isActive == '1')
					$this->layout->content = View::make('frontend.properties.view')
						->with('property', $property)
						->with('primaryimages', $primaryimages)
						->with('propertyimages', $otherimages)
						->with('property_type', $property_typeName)
						->with('property_status', $property_statusName)
						->with('property_vendor', $property_vendorName)
						->with('property_location', $property_locationName)
						->with('property_hasGarage', $property_garage)
						->with('property_hasGarden', $property_garden)
						->with('property_active', $property_active)
						->with('property_deleted', $property_deleted);
			}
		} 

		else {
			return Redirect::route('webproperties')
				->with('error-message', 'Requested Property was not found');
		}
	}

    /**
     * Show the official website's property index page.
     */
	public function get_index(){
		$allproperties = DB::table('properties')
			->where('property_isDeleted', '!=', '1')
			->where('property_isActive', '1')
			->where('property_statusId', Property::getForSaleId())
			->orderBy('created_at','desc')->paginate(12);
		$alllocations = DB::table('locations')->orderBy('location_name')->get();
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
		$allimages = DB::table('images')->orderBy('image_propertyId')->get();

		$property_type = array('' => 'Select One') + 
			Property_Type::lists('property_type_name', 'property_type_id');

		$property_location = array('' => 'Select One') + 
			Location::lists('location_name', 'location_id');

		$this->layout->content = View::make('frontend.properties.index')
			->with('title', 'List of Properties')
			->with('property_typeId',$property_type)
			->with('property_locationId',$property_location)
			->with('properties', $allproperties)
			->with('propertylocations', $alllocations)
			->with('propertystatuses', $allpropertystatuses)
			->with('propertytypes', $allpropertytypes)
			->with('propertyimages', $allimages);
	}

    /**
     * Show the official website's filtered property index page.
     */
	public function get_filteredindex(){

		$query = DB::table('properties')->where('property_isDeleted', '!=', '1')
										->where('property_isActive', '1')
										->where('property_statusId', Property::getForSaleId());

		$property_statusId = Input::get('property_statusId');
		$property_typeId = Input::get('property_typeId');
		$property_locationId = Input::get('property_locationId');

		if($property_statusId!="")
			$query->where('property_statusId', $property_statusId);

		if($property_typeId != "")
			$query->where('property_typeId', $property_typeId);

		if($property_locationId != "")
			$query->where('property_locationId', $property_locationId);

		$filteredproperties = $query->paginate(12);

		$alllocations = DB::table('locations')->orderBy('location_name')->get();
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();

		$allimages = DB::table('images')->orderBy('image_propertyId')->get();

		$property_type = array('' => 'Select One') + 
			Property_Type::lists('property_type_name', 'property_type_id');

		$property_status = array('' => 'Select One') + 
			Property_Status::lists('property_status_name', 'property_status_id');

		$property_location = array('' => 'Select One') + 
			Location::lists('location_name', 'location_id');

		$this->layout->content = View::make('frontend.properties.index', compact('property_typeId'))
			->with('title', 'List of Properties')
			->with('property_typeId',$property_type)
			->with('property_statusId',$property_status)
			->with('property_locationId',$property_location)
			->with('properties', $filteredproperties)
			->with('propertylocations', $alllocations)
			->with('propertystatuses', $allpropertystatuses)
			->with('propertytypes', $allpropertytypes)
			->with('propertyimages', $allimages);
	}

    /**
     * Show the official website's 'My Properties' index page.
     */
	public function get_myindex(){

		if(Auth::check()){
			$customer = Customer::find(Auth::user()->getCustomerId());

			if($customer->customer_type == 'Vendor') {

				$allproperties = DB::table('properties')
						->where('property_isDeleted', '!=', '1')
						->where('property_isActive', '1')
						->where('property_vendorId', $customer->customer_id)
						->orderBy('created_at','desc')->paginate(12);
			}

			else {

				$alloffers = DB::table('offers')
						->where('offer_isDeleted', '!=', '1')
						->where('offer_buyerId', $customer->customer_id)
						->orderBy('created_at')->get();

				$offerpropertyIds = array();

				if($alloffers !=null){
					foreach ($alloffers as $offer) {
						$offerpropertyIds[] = $offer->offer_propertyId;
					}
				}

				$allinterests = DB::table('interests')
						->where('interest_customerId', $customer->customer_id)
						->orderBy('created_at')->get();

				$interestpropertyIds = array();

				if($allinterests!=null){
					foreach ($allinterests as $interest) {
						$interestpropertyIds[] = $interest->interest_propertyId;
					}
				}

				$combinedpropertyIds = array_unique(array_merge($offerpropertyIds, $interestpropertyIds));

				if($combinedpropertyIds!=null)
					$allproperties = DB::table('properties')
						->where('property_isDeleted', '!=', '1')
						->where('property_isActive', '1')
						->whereIn('property_id', $combinedpropertyIds)
						->orderBy('created_at','desc')->paginate(12);
				else
					$allproperties = null;
			}

			$alllocations = DB::table('locations')->orderBy('location_name')->get();
			$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
			$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
			$allimages = DB::table('images')->orderBy('image_propertyId')->get();

			$this->layout->content = View::make('frontend.myproperties.index')
				->with('title', 'List of My Properties')
				->with('properties', $allproperties)
				->with('propertylocations', $alllocations)
				->with('propertystatuses', $allpropertystatuses)
				->with('propertytypes', $allpropertytypes)
				->with('propertyimages', $allimages);
		}
	}
}