<?php

//IMS Controller Class

class ImsController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS home page.
     */
	public function get_home(){

		if(Auth::check()){
			if(Auth::user()->getRole()=="Content Editor"){
				return Redirect::route('cmshome')
					->with('error-message', 'Restricted Access!');
			}
			else
				$this->layout->content = View::make('home.imshome');
		}
		else
			return Redirect::route('imslogin')
				->with('error-message', 'Please login!');
				
	}
}