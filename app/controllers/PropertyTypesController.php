<?php

//IMS Property Type Controller Class

class PropertyTypesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's property type index page.
     */
	public function get_index(){

		$allpropertytypes = DB::table('property_types')->orderBy('property_type_name')->paginate(10);

		$this->layout->content = View::make('property_types.index')
			->with('title', 'List of Property Types')
			->with('property_types', $allpropertytypes);
	}

    /**
     * Show the IMS's property type details page.
     */
	public function get_view($property_type_id){

		if (Property_Type::find($property_type_id) != null) {

			$property_typeId = Property_Type::find($property_type_id);
			
			$this->layout->content = View::make('property_types.view')
				->with('title', 'Property Type View Page')
				->with('property_type', Property_Type::find($property_type_id));
		}
		else
			return Redirect::route('property_types')
				->with('error-message', 'Requested Property Type was not found');
	}

    /**
     * Show the IMS's property type creation page.
     */
	public function get_new(){

		$property_type = array('' => 'Select One') + 
			Property_Type::lists('property_type_name', 'property_type_id');

		$this->layout->content = View::make('property_types.new')
			->with('title', 'Add New Property Type')
			->with('property_typeId',$property_type);
	}

    /**
     * Validate and create the property type.
     */
	public function post_create(){
	
		$validation = Property_Type::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('new_property_type')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {
			Property_Type::create(array(
				'property_type_name'=>Input::get('property_type_name'),
				'property_type_description'=>Input::get('property_type_description')
			));

			return Redirect::route('property_types')
				->with('message', 'The property type was created successfully!');
		}
	}

    /**
     * Show the IMS's property type modification page.
     */
	public function get_edit($property_type_id){

		if(Property_Type::find($property_type_id)!=null){
			$this->layout->content = View::make('property_types.edit')
				->with('title', 'Edit Property Type')
				->with('property_type', Property_Type::find($property_type_id));
		}
		else
			return Redirect::route('property_types')
				->with('error-message', 'Requested Property Type was not found');
	}

    /**
     * Validate and edit the property type.
     */
	public function put_update(){
		$property_type_id = Input::get('property_type_id');

		$validation = Property_Type::validate_edit($property_type_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_property_type', $property_type_id)
	 			->withErrors($validation);
		}

		else {

			Property_Type::find($property_type_id)->update(array(
				'property_type_name'=>Input::get('property_type_name'),
				'property_type_description'=>Input::get('property_type_description')
			));

			return Redirect::route('property_type', $property_type_id)
				->with('message', 'The property type was updated successfully!');
		}
	}

    /**
     * Show the IMS's property type deletion page.
     */
	public function get_destroy($property_typeId){
		$this->layout->content = View::make('property_types.confirm-delete')
			->with('title', 'Confirm Property Type Deletion')
			->with('property_type', Property_Type::find($property_typeId));
	}

    /**
     * Delete the property type.
     */
	public function delete_destroy(){
		Property_Type::find(Input::get('property_type_id'))->delete();
		return Redirect::route('property_types')
				->with('message', 'The property type was deleted successfully!');
	}

}