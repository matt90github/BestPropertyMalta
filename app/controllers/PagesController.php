<?php

//CMS Page Controller Class

class PagesController extends BaseController {

    //Enable restful feature
    public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the CMS's page index view.
     */
	public function get_index(){
		$allpages = DB::table('pages')->where('page_isDeleted', '!=', '1')
									  ->orderBy('created_at','desc')->paginate(10);

		$this->layout->content = View::make('pages.index')
			->with('title', 'List of Pages')
			->with('pages', $allpages);
	}

    /**
     * Show the CMS's page details view.
     */
	public function get_view($page_id){

		if (Page::find($page_id) != null && !Page::find($page_id)->page_isDeleted) {
			$page_isPublished = Page::find($page_id)->page_isPublished;
			$page_published = 'No';

			if($page_isPublished==1)
				$page_published = 'Yes';

			$page_isDeleted = Page::find($page_id)->page_isDeleted;
			$page_deleted = 'No';

			if($page_isDeleted==1)
				$page_deleted = 'Yes';

			$this->layout->content = View::make('pages.view')
				->with('title', 'Page View Page')
				->with('page', Page::find($page_id))
				->with('page_published', $page_published)
				->with('page_deleted', $page_deleted);
		}
		else
			return Redirect::route('pages')
				->with('error-message', 'Requested Page was not found');
	}

    /**
     * Show the CMS's page creation view.
     */
	public function get_new(){

		$this->layout->content = View::make('pages.new')
			->with('title', 'Add New Page');
	}

    /**
     * Validate and create the page.
     */
	public function post_create(){
	
		if(Input::has('page_isPublished'))
			$isPublished = 1;
		else
			$isPublished = 0;

		$validation = Page::validate_create();

		if($validation->fails()) {
		 	return Redirect::route('new_page')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			Page::create(array(
				'page_title'=>Input::get('page_title'),
				'page_content'=>Input::get('page_content'),
				'page_isPublished'=>$isPublished,
				'page_isDeleted'=>'0'
			));

			return Redirect::route('pages')
				->with('message', 'The page was created successfully!');
		}
	}

    /**
     * Show the CMS's page modification view.
     */
	public function get_edit($page_id){
		if(Page::find($page_id) != null){

			$page_isPublished = Page::find($page_id)->page_isPublished;

			if($page_isPublished==1)
				$checkbox_enabled=true;
			else
				$checkbox_enabled=false;

			$this->layout->content = View::make('pages.edit')
				->with('title', 'Edit Page')
				->with('page', Page::find($page_id))
				->with('checkbox_enabled', $checkbox_enabled);
		}
		else
			return Redirect::route('pages')
				->with('error-message', 'Requested Page was not found');
	}

    /**
     * Validate and edit the page.
     */
	public function put_update(){
		$page_id = Input::get('page_id');

		if(Input::has('page_isPublished'))
			$isPublished = 1;
		else
			$isPublished = 0;

		$validation = Page::validate_edit($page_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_page', $page_id)
	 			->withErrors($validation);
		}

		else {

			Page::find($page_id)->update(array(
				'page_title'=>Input::get('page_title'),
				'page_content'=>Input::get('page_content'),
				'page_isPublished'=>$isPublished,
				'page_isDeleted'=>'0'
			));

			return Redirect::route('page', $page_id)
				->with('message', 'The page was updated successfully!');
		}
	}

    /**
     * Show the CMS's page deletion view.
     */
	public function get_destroy($page_id){
		$this->layout->content = View::make('pages.confirm-delete')
			->with('title', 'Confirm Page Deletion')
			->with('page', Page::find($page_id));
	}

    /**
     * Update the page's state to deleted.
     */
	public function delete_destroy(){
		Page::find(Input::get('page_id'))->update(array(
				'page_isPublished'=>'0',
				'page_isDeleted'=>'1'
		));
		return Redirect::route('pages')
				->with('message', 'The page was deleted successfully!');
	}
}
