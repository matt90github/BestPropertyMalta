<?php

//IMS Property Status Controller Class

class PropertyStatusesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's property status index page.
     */
	public function get_index(){

		$allpropertystatuses = DB::table('property_statuses')->orderBy('property_status_name')->paginate(10);

		$this->layout->content = View::make('property_statuses.index')
			->with('title', 'List of Property Statuses')
			->with('property_statuses', $allpropertystatuses);
	}

    /**
     * Show the IMS's property status details page.
     */
	public function get_view($property_status_id){
		if (Property_Status::find($property_status_id) != null) {

			$property_statusId = Property_Status::find($property_status_id);
			
			$this->layout->content = View::make('property_statuses.view')
				->with('title', 'Property Status View Page')
				->with('property_status', Property_Status::find($property_status_id));
		}
		else
			return Redirect::route('property_statuses')
				->with('error-message', 'Requested Property Status was not found');
	}

    /**
     * Show the IMS's property status creation page.
     */
	public function get_new(){

		$property_status = array('' => 'Select One') + 
			Property_Status::lists('property_status_name', 'property_status_id');

		$this->layout->content = View::make('property_statuses.new')
			->with('title', 'Add New Property Status')
			->with('property_statusId',$property_status);
	}

    /**
     * Validate and create the property status.
     */
	public function post_create(){
	
		$validation = Property_Status::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('new_property_status')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {
			Property_Status::create(array(
				'property_status_name'=>Input::get('property_status_name'),
				'property_status_description'=>Input::get('property_status_description')
			));

			return Redirect::route('property_statuses')
				->with('message', 'The property status was created successfully!');
		}
	}

    /**
     * Show the IMS's property status modification page.
     */
	public function get_edit($property_status_id){

		if(Property_Status::find($property_status_id)!=null){
			$this->layout->content = View::make('property_statuses.edit')
				->with('title', 'Edit Property Status')
				->with('property_status', Property_Status::find($property_status_id));
		}
		else{
			return Redirect::route('property_statuses')
				->with('error-message', 'Requested Property Status was not found');
		}
	}

    /**
     * Validate and edit the property status.
     */
	public function put_update(){
		$property_status_id = Input::get('property_status_id');

		$validation = Property_Status::validate_edit($property_status_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_property_status', $property_status_id)
	 			->withErrors($validation);
		}

		else {
			Property_Status::find($property_status_id)->update(array(
				'property_status_name'=>Input::get('property_status_name'),
				'property_status_description'=>Input::get('property_status_description')
			));

			return Redirect::route('property_status', $property_status_id)
				->with('message', 'The property status was updated successfully!');			
		}
	}

    /**
     * Show the IMS's property status deletion page.
     */
	public function get_destroy($property_statusId){
		$this->layout->content = View::make('property_statuses.confirm-delete')
			->with('title', 'Confirm Property Status Deletion')
			->with('property_status', Property_Status::find($property_statusId));
	}

    /**
     * Delete the property status.
     */
	public function delete_destroy(){
		Property_Status::find(Input::get('property_status_id'))->delete();
		return Redirect::route('property_statuses')
				->with('message', 'The property status was deleted successfully!');
	}

}