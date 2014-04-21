<?php

use Illuminate\Auth\AdminGuard;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Hashing\BcryptHasher;

//CMS Staff Controller Class

class CmsStaffController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the CMS's staff login page.
     */
	public function get_login(){
	    if (!Auth::guest()) 
	    	return Redirect::route('cmshome')->with('message', 'You are already logged in!');
	    else
			$this->layout->content = View::make('staff.logincms');
	}

    /**
     * Validate and login the staff member.
     */
	public function post_signedin(){

		$staffdata = array(
			'staff_emailAddress' => Input::get('staff_emailAddress'),
			'password' => Input::get('staff_password')
		);

		$validation = Staff::validate_login();

		if($validation->fails()) {
		 	return Redirect::route('cmslogin')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			if (Auth::attempt($staffdata)) {
				$session_staff_id = Auth::user()->staff_id;
	   			return Redirect::route('cmshome')->with('message', 'You are now logged in!');

			} else {
	   			return Redirect::route('cmslogin')
	      			->with('error-message', 'Your email address/password combination was incorrect. Please try again.')
	      			->withInput();
			}
		}
	}

    /**
     * Logout the staff member and show the CMS staff logout page.
     */
	public function get_logout()
	{
		Auth::logout();
		return Redirect::route('cmslogin')->with('message', 'You are now logged out!'); 
	}

}