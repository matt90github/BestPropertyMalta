<?php

//IMS Offer Status Controller Class

class OfferStatusesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's offer status index page.
     */
	public function get_index(){

		$allofferstatuses = DB::table('offer_statuses')->orderBy('offer_status_name')->paginate(10);

		$this->layout->content = View::make('offer_statuses.index')
			->with('title', 'List of Offer Statuses')
			->with('offer_statuses', $allofferstatuses);
	}

    /**
     * Show the IMS's offer status details page.
     */
	public function get_view($offer_status_id){
		if (Offer_Status::find($offer_status_id) != null) {

			$offer_statusId = Offer_Status::find($offer_status_id);
			
			$this->layout->content = View::make('offer_statuses.view')
				->with('title', 'Offer Status View Page')
				->with('offer_status', Offer_Status::find($offer_status_id));
		}
		else
			return Redirect::route('offer_statuses')
				->with('error-message', 'Requested Offer Status was not found');
	}

    /**
     * Show the IMS's offer status creation page.
     */
	public function get_new(){

		$offer_status = array('' => 'Select One') + 
			Offer_Status::lists('offer_status_name', 'offer_status_id');

		$this->layout->content = View::make('offer_statuses.new')
			->with('title', 'Add New Offer Status')
			->with('offer_statusId',$offer_status);
	}

    /**
     * Validate and create the offer status.
     */
	public function post_create(){
	
		$validation = Offer_Status::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('new_offer_status')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {
			Offer_Status::create(array(
				'offer_status_name'=>Input::get('offer_status_name'),
				'offer_status_description'=>Input::get('offer_status_description')
			));

			return Redirect::route('offer_statuses')
				->with('message', 'The offer status was created successfully!');
		}
	}

    /**
     * Show the IMS's offer status modification page.
     */
	public function get_edit($offer_status_id){
		if(Offer_Status::find($offer_status_id) != null){
			$this->layout->content = View::make('offer_statuses.edit')
				->with('title', 'Edit Offer Status')
				->with('offer_status', Offer_Status::find($offer_status_id));
		}
		else
			return Redirect::route('offer_statuses')
				->with('error-message', 'Requested Offer Status was not found');
	}

    /**
     * Validate and edit the offer status.
     */
	public function put_update(){
		$offer_status_id = Input::get('offer_status_id');

		$validation = Offer_Status::validate_edit($offer_status_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_offer_status', $offer_status_id)
	 			->withErrors($validation);
		}

		else {
			Offer_Status::find($offer_status_id)->update(array(
				'offer_status_name'=>Input::get('offer_status_name'),
				'offer_status_description'=>Input::get('offer_status_description')
			));

			return Redirect::route('offer_status', $offer_status_id)
				->with('message', 'The offer status was updated successfully!');
		}
	}

    /**
     * Show the IMS's offer status deletion page.
     */
	public function get_destroy($offer_statusId){
		$this->layout->content = View::make('offer_statuses.confirm-delete')
			->with('title', 'Confirm Offer Status Deletion')
			->with('offer_status', Offer_Status::find($offer_statusId));
	}

    /**
     * Delete the offer status.
     */
	public function delete_destroy(){
		Offer_Status::find(Input::get('offer_status_id'))->delete();
		return Redirect::route('offer_statuses')
				->with('message', 'The offer status was deleted successfully!');
	}

}