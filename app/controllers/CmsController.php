<?php

//CMS Controller Class

class CmsController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the CMS home page.
     */
	public function get_home(){

		if(Auth::check())
			$this->layout->content = View::make('home.cmshome');
		else
			return Redirect::route('cmslogin')
				->with('error-message', 'Please login!');
	}
}