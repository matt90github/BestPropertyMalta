<?php

//Official Website Search Controller Class

class SearchController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.frontend";

    /**
     * Redirect the user to the home page if he goes directly to the search results page.
     */
	public function get_search(){
		
		return Redirect::route('home')
			->with('error-message', 'You must specify a search term!');
	}

    /**
     * Show the official website's search results page.
     */
	public function post_search(){
		
		$searchterms = Input::get('searchterms');

		if (empty($searchterms) || (strlen($searchterms) > 0 && strlen(trim($searchterms)) == 0)){
			return Redirect::route('home')
				->with('error-message', 'You must specify a search term!');	
		}

		else{

			$properties = Property::where('property_isActive', '=', '1')
								  ->where('property_isDeleted', '=', '0')
								  ->where('property_name', 'LIKE', '%'.$searchterms.'%')
								  ->orWhere('property_description', 'LIKE', '%'.$searchterms.'%')
								  ->orderBy('property_name', 'asc')->get();


			$pages = Page::where('page_isPublished', '=', '1')
							      ->where('page_isDeleted', '=', '0')
								  ->where('page_title', 'LIKE', '%'.$searchterms.'%')
								  ->orWhere('page_content', 'LIKE', '%'.$searchterms.'%')
								  ->orderBy('page_title', 'asc')->get();

			$this->layout->content = View::make('frontend.search.search-results')
				->with('searchterms', $searchterms)
				->with('properties',$properties)
				->with('pages',$pages);	
		}
	
	}
}