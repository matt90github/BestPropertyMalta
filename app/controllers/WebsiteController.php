<?php

//Official Website Controller Class

class WebsiteController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Show the Official Website home page.
     */
	public function get_home(){

		$bannerimages = DB::table('banner_images')
					->orderBy('created_at','desc')->get();

		$aboutus = DB::table('pages')
					->where('page_title', '=', 'About Us')
					->where('page_isPublished', '=', '1')
					->where('page_isDeleted', '=', '0')->get();

		$this->layout->content = View::make('home.home')
			->with('banner_images', $bannerimages)
			->with('aboutus', $aboutus);
	}

}