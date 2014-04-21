<?php

//Interest (Wish List) Controller Class

class InterestsController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Add the property to the customer's wish list.
     */
	public function post_create(){

		Interest::create(array(
			'interest_customerId'=>Auth::user()->getCustomerId(),
			'interest_propertyId'=>Input::get('property_id')
		));

		return Redirect::back()
			->with('message', 'The property was successfully added to your wishlist!');
	}

    /**
     * Remove the property from the customer's wish list.
     */
	public function delete_destroy(){
		Interest::where('interest_customerId', Auth::user()->getCustomerId())
					  ->where('interest_propertyId', Input::get('property_id'))
					  ->delete();	
	
		return Redirect::back()
			->with('message', 'The property was successfully removed from your wishlist!');
	}
}