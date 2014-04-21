<?php

//Official Website Page Controller Class

class FrontEndPagesController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Show the official website's page view.
     */
	public function get_view($page_id){

		$page = Page::find($page_id);

		if ($page != null) {
			if($page->page_isPublished == '1')
				$this->layout->content = View::make('frontend.pages.view')
					->with('page', $page);
			else
				return Redirect::route('home')
					->with('error-message', 'Requested Page was not found');
		} 

		else {
			return Redirect::route('home')
				->with('error-message', 'Requested Page was not found');
		}
	}

    /**
     * Show the official website's about us page.
     */
	public function get_aboutus(){
		$aboutus = DB::table('pages')
			->where('page_title', '=', 'About Us')
			->where('page_isPublished', '=', '1')
			->where('page_isDeleted', '=', '0')->get();

		if($aboutus!=null)
		{
			$page = null;

			foreach ($aboutus as $aboutuspage) {
				$page = Page::find($aboutuspage->page_id);
			}

			$this->layout->content = View::make('frontend.pages.view')
				->with('page', $page);
		}
		else
			return Redirect::route('home')
				->with('error-message', 'Requested Page was not found');
	}

}