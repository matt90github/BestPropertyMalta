<?php

//CMS Property Controller Class

class PropertiesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the CMS's property index page.
     */
	public function get_index(){
		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')->orderBy('created_at','desc')->paginate(10);
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
		$allpropertyvendors = DB::table('customers')->where('customer_type', 'Vendor')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('properties.index')
			->with('title', 'List of Properties')
			->with('properties', $allproperties)
			->with('propertytypes', $allpropertytypes)
			->with('propertyvendors', $allpropertyvendors)
			->with('propertystatuses', $allpropertystatuses);
	}

    /**
     * Show the CMS's property index page filtered by 'for sale' properties.
     */
	public function get_forsaleindex(){
		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')
												->where('property_statusId', '1')
												->orderBy('created_at','desc')->paginate(10);

		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
		$allpropertyvendors = DB::table('customers')->where('customer_type', 'Vendor')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('properties.index')
			->with('title', 'List of Properties')
			->with('properties', $allproperties)
			->with('propertytypes', $allpropertytypes)
			->with('propertyvendors', $allpropertyvendors)
			->with('propertystatuses', $allpropertystatuses);
	}

    /**
     * Show the CMS's property index page filtered by 'sold subject to contract' properties.
     */
	public function get_soldstcindex(){
		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')
												->where('property_statusId', '2')
												->orderBy('created_at','desc')->paginate(10);
												
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
		$allpropertyvendors = DB::table('customers')->where('customer_type', 'Vendor')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('properties.index')
			->with('title', 'List of Properties')
			->with('properties', $allproperties)
			->with('propertytypes', $allpropertytypes)
			->with('propertyvendors', $allpropertyvendors)
			->with('propertystatuses', $allpropertystatuses);
	}

    /**
     * Show the CMS's property index page filtered by 'sold' properties.
     */
	public function get_soldindex(){
		$allproperties = DB::table('properties')->where('property_isDeleted', '!=', '1')
												->where('property_statusId', '3')
												->orderBy('created_at','desc')->paginate(10);
												
		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->get();
		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->get();
		$allpropertyvendors = DB::table('customers')->where('customer_type', 'Vendor')->orderBy('customer_firstName')->get();

		$this->layout->content = View::make('properties.index')
			->with('title', 'List of Properties')
			->with('properties', $allproperties)
			->with('propertytypes', $allpropertytypes)
			->with('propertyvendors', $allpropertyvendors)
			->with('propertystatuses', $allpropertystatuses);
	}

    /**
     * Show the CMS's property details page.
     */
	public function get_view($property_id){

		if (Property::find($property_id) != null && !Property::find($property_id)->property_isDeleted) {

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

			$this->layout->content = View::make('properties.view')
				->with('title', 'Property View Page')
				->with('property', Property::find($property_id))
				->with('property_type', $property_typeName)
				->with('property_status', $property_statusName)
				->with('property_vendor', $property_vendorName)
				->with('property_location', $property_locationName)
				->with('property_hasGarage', $property_garage)
				->with('property_hasGarden', $property_garden)
				->with('property_active', $property_active)
				->with('property_deleted', $property_deleted);
		}
		else
			return Redirect::route('properties')
				->with('error-message', 'Requested Property was not found');
	}

    /**
     * Show the CMS's property creation page.
     */
	public function get_new(){

		$property_type = array('' => 'Select One') + 
			Property_Type::lists('property_type_name', 'property_type_id');

		$property_status = array('' => 'Select One') + 
			Property_Status::lists('property_status_name', 'property_status_id');

		$property_vendor = array('' => 'Select One') + 
			Customer::where('customer_type', 'Vendor')
					->where('customer_isDeleted', '0')
					->get()->lists('full_name', 'customer_id');

		$property_location = array('' => 'Select One') + 
			Location::lists('location_name', 'location_id');

		$this->layout->content = View::make('properties.new')
			->with('title', 'Add New Property')
			->with('property_typeId',$property_type)
			->with('property_statusId',$property_status)
			->with('property_vendorId',$property_vendor)
			->with('property_locationId',$property_location);
	}

    /**
     * Validate and create the property.
     */
	public function post_create(){
		if(Input::has('property_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		if(Input::has('property_hasGarage'))
			$hasGarage = 1;
		else
			$hasGarage = 0;

		if(Input::has('property_hasGarden'))
			$hasGarden = 1;
		else
			$hasGarden = 0;

		$validation = Property::validate_create();

		if($validation->fails()) {
		 	return Redirect::route('new_property')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			Property::create(array(
				'property_typeId'=>Input::get('property_typeId'),
				'property_statusId'=>Input::get('property_statusId'),
				'property_vendorId'=>Input::get('property_vendorId'),
				'property_name'=>Input::get('property_name'),
				'property_description'=>Input::get('property_description'),
				'property_locationId'=>Input::get('property_locationId'),
				'property_squareMetres'=>Input::get('property_squareMetres'),
				'property_bathrooms'=>Input::get('property_bathrooms'),
				'property_bedrooms'=>Input::get('property_bedrooms'),
				'property_hasGarage'=>$hasGarage,
				'property_hasGarden'=>$hasGarden,
				'property_price'=>Input::get('property_price'),
				'property_isActive'=>$isActive,
				'property_isDeleted'=>'0'
			));

			return Redirect::route('properties')
				->with('message', 'The property was created successfully!');
		}
	}

    /**
     * Show the CMS's property modification page.
     */
	public function get_edit($property_id){
		if(Property::find($property_id) != null){

			$property_location = array('' => 'Select One') + 
				Location::lists('location_name', 'location_id');

			$property_type = array('' => 'Select One') + 
				Property_Type::lists('property_type_name', 'property_type_id');

			$property_status = array('' => 'Select One') + 
				Property_Status::lists('property_status_name', 'property_status_id');

			$property_vendor = array('' => 'Select One') + 
				Customer::where('customer_type', 'Vendor')
						->where('customer_isDeleted', '0')
						->get()->lists('full_name', 'customer_id');

			$property_isActive = Property::find($property_id)->property_isActive;

			if($property_isActive==1)
				$property_checkbox_enabled=true;
			else
				$property_checkbox_enabled=false;

			$property_hasGarage = Property::find($property_id)->property_hasGarage;

			if($property_hasGarage==1)
				$garage_checkbox_enabled=true;
			else
				$garage_checkbox_enabled=false;

			$property_hasGarden = Property::find($property_id)->property_hasGarden;

			if($property_hasGarden==1)
				$garden_checkbox_enabled=true;
			else
				$garden_checkbox_enabled=false;

			$this->layout->content = View::make('properties.edit')
				->with('title', 'Edit Property')
				->with('property', Property::find($property_id))
				->with('property_typeId',$property_type)
				->with('property_statusId',$property_status)
				->with('property_vendorId',$property_vendor)
				->with('property_locationId',$property_location)
				->with('property_checkbox_enabled', $property_checkbox_enabled)
				->with('garage_checkbox_enabled', $garage_checkbox_enabled)
				->with('garden_checkbox_enabled', $garden_checkbox_enabled);
		}
		else{
			return Redirect::route('properties')
				->with('error-message', 'Requested Property was not found');
		}
	}

    /**
     * Validate and edit the property.
     */
	public function put_update(){
		$property_id = Input::get('property_id');

		if(Input::has('property_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		if(Input::has('property_hasGarage'))
			$hasGarage = 1;
		else
			$hasGarage = 0;

		if(Input::has('property_hasGarden'))
			$hasGarden = 1;
		else
			$hasGarden = 0;

		$validation = Property::validate_edit();

		if($validation->fails()) {
		 	return Redirect::route('edit_property',$property_id)
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			Property::find($property_id)->update(array(
				'property_typeId'=>Input::get('property_typeId'),
				'property_statusId'=>Input::get('property_statusId'),
				'property_vendorId'=>Input::get('property_vendorId'),
				'property_name'=>Input::get('property_name'),
				'property_description'=>Input::get('property_description'),
				'property_locationId'=>Input::get('property_locationId'),
				'property_squareMetres'=>Input::get('property_squareMetres'),
				'property_bathrooms'=>Input::get('property_bathrooms'),
				'property_bedrooms'=>Input::get('property_bedrooms'),
				'property_hasGarage'=>$hasGarage,
				'property_hasGarden'=>$hasGarden,
				'property_price'=>Input::get('property_price'),
				'property_isActive'=>$isActive,
				'property_isDeleted'=>'0'
			));

			return Redirect::route('property', $property_id)
				->with('message', 'The property was updated successfully!');
		}
	}

    /**
     * Show the CMS's property deletion page.
     */
	public function get_destroy($property_id){
		$this->layout->content = View::make('properties.confirm-delete')
			->with('title', 'Confirm Property Deletion')
			->with('property', Property::find($property_id));
	}

    /**
     * Update the property's state to deleted.
     */
	public function delete_destroy(){
		Property::find(Input::get('property_id'))->update(array(
				'property_isActive'=>'0',
				'property_isDeleted'=>'1'
		));
		return Redirect::route('properties')
				->with('message', 'The property was deleted successfully!');
	}

}