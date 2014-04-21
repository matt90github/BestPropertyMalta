<?php

use Illuminate\Auth\AdminGuard;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Hashing\BcryptHasher;

//IMS Staff Controller Class

class ImsStaffController extends BaseController {

    //Enable restful feature
	public $restful = true;

	//Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's staff login page.
     */
	public function get_login(){
	    if (!Auth::guest()) 
	    	return Redirect::route('imshome')->with('message', 'You are already logged in!');
	    else
			$this->layout->content = View::make('staff.loginims');
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
		 	return Redirect::route('imslogin')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {

			if (Auth::attempt($staffdata)) {

				$staff_role = Auth::user()->getRole();

				if ($staff_role == 'Content Editor'){
					Auth::logout();
					return Redirect::route('imslogin')
	      				->with('error-message', 'You cannot access the IMS as a content editor!')
	      				->withInput();
				}

				else {
					$session_staff_id = Auth::user()->staff_id;
	   				return Redirect::route('imshome')->with('message', 'You are now logged in!');
	   			}

			} else {
	   			return Redirect::route('imslogin')
	      			->with('error-message', 'Your email address/password combination was incorrect. Please try again.')
	      			->withInput();
			}
		}
	}

    /**
     * Logout the staff member and show the IMS staff logout page.
     */
	public function get_logout()
	{
		Auth::logout();
		return Redirect::route('imslogin')->with('message', 'You are now logged out!'); 
	}

    /**
     * Show the IMS's staff member index page.
     */
	public function get_index(){

		$allstaff = DB::table('staff')->where('staff_isDeleted', '!=', '1')->orderBy('staff_firstName')->paginate(10);
		$allstaffroles = DB::table('staff_roles')->orderBy('staff_role_name')->get();

		$this->layout->content = View::make('staff.index')
			->with('title', 'List of Staff')
			->with('staff', $allstaff)
			->with('staffroles', $allstaffroles);
	}

    /**
     * Show the IMS's staff member details page.
     */
	public function get_view($staff_id){

		if (Staff::find($staff_id) != null && !Staff::find($staff_id)->staff_isDeleted) {

			$staff_roleId = Staff::find($staff_id)->staff_roleId;
			$staff_roleName = Staff_Role::find($staff_roleId)->staff_role_name;
			
			$staff_countryId = Staff::find($staff_id)->staff_countryId;
			$staff_countryName = Country::find($staff_countryId)->country_name;

			$staff_addressLine2 = Staff::find($staff_id)->staff_addressLine2;
			
			if($staff_addressLine2=="")
				$staff_addressLine2 = 'N/A';

			$staff_phoneNumber = Staff::find($staff_id)->staff_phoneNumber;

			if($staff_phoneNumber=="")
				$staff_phoneNumber = 'N/A';

			$staff_isActive = Staff::find($staff_id)->staff_isActive;

			$staff_active = 'No';

			if($staff_isActive==1)
				$staff_active = 'Yes';

			$staff_isDeleted = Staff::find($staff_id)->staff_isDeleted;

			$staff_deleted = 'No';

			if($staff_isDeleted==1)
				$staff_deleted = 'Yes';

			$this->layout->content = View::make('staff.view')
				->with('title', 'Staff View Page')
				->with('staff', Staff::find($staff_id))
				->with('staff_role', $staff_roleName)
				->with('staff_country', $staff_countryName)
				->with('staff_addressLine2', $staff_addressLine2)
				->with('staff_phoneNumber', $staff_phoneNumber)
				->with('staff_active', $staff_active)
				->with('staff_deleted', $staff_deleted);
		}
		else
			return Redirect::route('stafflist')
				->with('error-message', 'Requested Staff Member was not found');
	}

    /**
     * Show the IMS's staff member creation page.
     */
	public function get_new(){

		$staff_role = array('' => 'Select One') + 
			Staff_Role::lists('staff_role_name', 'staff_role_id');

		$countries = array('' => 'Select One') + 
			Country::lists('country_name', 'country_id');

		$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
			'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
			'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
			'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

		$this->layout->content = View::make('staff.new')
			->with('title', 'Add New Staff Member')
			->with('staff_roleId',$staff_role)
			->with('staff_countryId', $countries)
			->with('staff_title', $titles);
	}

    /**
     * Validate and create the staff member.
     */
	public function post_create(){
	
		$dob = str_replace("/", "-", Input::get('staff_dateOfBirth'));
		$date_dob = new DateTime($dob);
		$formatted_dob = date_format($date_dob, 'Y-m-d H:i:s');

		$doe = str_replace("/", "-", Input::get('staff_employmentDate'));
		$date_doe = new DateTime($doe);
		$formatted_doe = date_format($date_doe, 'Y-m-d H:i:s');

		$now = new DateTime();

		if(Input::has('staff_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		$validation = Staff::validate_create();

		 if($validation->fails()) {
		 	return Redirect::route('new_staff')
		 		->withErrors($validation)
		 		->withInput();
		 }

		 else {
			Staff::create(array(
				'staff_title'=>Input::get('staff_title'),
				'staff_firstName'=>Input::get('staff_firstName'),
				'staff_lastName'=>Input::get('staff_lastName'),
				'staff_emailAddress'=>Input::get('staff_emailAddress'),
				'staff_username'=>Input::get('staff_username'),
				'staff_password'=>Hash::make(Input::get('staff_password')),
				'staff_roleId'=>Input::get('staff_roleId'),
				'staff_idCardNumber'=>Input::get('staff_idCardNumber'),
				'staff_dateOfBirth'=>$formatted_dob,
				'staff_employmentDate'=>$formatted_doe,
				'staff_addressLine1'=>Input::get('staff_addressLine1'),
				'staff_addressLine2'=>Input::get('staff_addressLine2'),
				'staff_countryId'=>Input::get('staff_countryId'),
				'staff_phoneNumber'=>Input::get('staff_phoneNumber'),
				'staff_mobileNumber'=>Input::get('staff_mobileNumber'),
				'staff_isActive'=>$isActive,
				'staff_isDeleted'=>'0'
			));

			return Redirect::route('stafflist')
				->with('message', 'The staff member was created successfully!');
		}
	}

	 /**
     * Show the IMS's staff member modification page.
     */
	public function get_edit($staff_id){

		if(Staff::find($staff_id) != null){
			$staff_role = array('' => 'Select One') + 
				Staff_Role::lists('staff_role_name', 'staff_role_id');

			$countries = array('' => 'Select One') + 
				Country::lists('country_name', 'country_id');

			$titles = array('' => 'Select One','Mr.'=>'Mr.','Mrs.'=>'Mrs.','Ms.'=>'Ms.','Miss'=>'Miss','Master'=>'Master',
				'Rev.'=>'Rev. (Reverend)','Fr.'=>'Fr. (Father)','Dr.'=>'Dr. (Doctor)','Atty.'=>'Atty. (Attorney)',
				'Prof.'=>'Prof. (Professor)','Hon.'=>'Hon. (Honorable)','Pres.'=>'Pres. (President)',
				'Gov.'=>'Gov. (Governor)','Coach'=>'Coach','Ofc.'=>'Ofc. (Officer)');

			$staff_isActive = Staff::find($staff_id)->staff_isActive;

			if($staff_isActive==1)
				$checkbox_enabled=true;
			else
				$checkbox_enabled=false;

			$this->layout->content = View::make('staff.edit')
				->with('title', 'Edit Staff Member')
				->with('staff', Staff::find($staff_id))
				->with('staff_roleId',$staff_role)
				->with('staff_countryId', $countries)
				->with('staff_title', $titles)
				->with('checkbox_enabled', $checkbox_enabled);
		}

		else
			return Redirect::route('stafflist')
				->with('error-message', 'Requested Staff Member was not found');
	}

    /**
     * Validate and edit the staff member.
     */
	public function put_update(){
		$staff_id = Input::get('staff_id');

		$dob = str_replace("/", "-", Input::get('staff_dateOfBirth'));
		$formatted_dob = date_format(new DateTime($dob), 'Y-m-d H:i:s');

		$doe = str_replace("/", "-", Input::get('staff_employmentDate'));
		$formatted_doe = date_format(new DateTime($doe), 'Y-m-d H:i:s');

		$now = new DateTime();

		if(Input::has('staff_isActive'))
			$isActive = 1;
		else
			$isActive = 0;

		$validation = Staff::validate_edit($staff_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_staff', $staff_id)
	 			->withErrors($validation);
		}

		else {
			Staff::find($staff_id)->update(array(
				'staff_title'=>Input::get('staff_title'),
				'staff_firstName'=>Input::get('staff_firstName'),
				'staff_lastName'=>Input::get('staff_lastName'),
				'staff_emailAddress'=>Input::get('staff_emailAddress'),
				'staff_username'=>Input::get('staff_username'),
				'staff_roleId'=>Input::get('staff_roleId'),
				'staff_idCardNumber'=>Input::get('staff_idCardNumber'),
				'staff_dateOfBirth'=>$formatted_dob,
				'staff_employmentDate'=>$formatted_doe,
				'staff_addressLine1'=>Input::get('staff_addressLine1'),
				'staff_addressLine2'=>Input::get('staff_addressLine2'),
				'staff_countryId'=>Input::get('staff_countryId'),
				'staff_phoneNumber'=>Input::get('staff_phoneNumber'),
				'staff_mobileNumber'=>Input::get('staff_mobileNumber'),
				'staff_isActive'=>$isActive,
				'staff_isDeleted'=>'0'
			));

			return Redirect::route('staff', $staff_id)
				->with('message', 'The staff member was updated successfully!');
		}
	}

    /**
     * Show the IMS staff member password modification page.
     */
	public function get_changepassword($staff_id){
		$this->layout->content = View::make('staff.changepassword')
			->with('title', 'Change Password')
			->with('staff', Staff::find($staff_id));
	}

    /**
     * Validate and update the staff member's password.
     */
	public function put_updatepassword(){
		$staff_id = Input::get('staff_id');

		$staff = Staff::find($staff_id);

		$validation = Staff::validate_changepassword();

		if($validation->fails()) {
	 		return Redirect::route('change_staff_password', $staff_id)
	 			->withErrors($validation);
		}

		else {
			if (Hash::check(Input::get('staff_old_password'), $staff->staff_password)) {
			
		 		Staff::find($staff_id)->update(array(
					'staff_password'=>Hash::make(Input::get('staff_new_password')),
				));

				return Redirect::route('staff', $staff_id)
					->with('message', 'The password was updated successfully!');
			}

			else {
				return Redirect::route('change_staff_password', $staff_id)
		 			->with('error-message', 'The old password inputted is not correct!');
			}
		}
	}

    /**
     * Show the IMS's staff member deletion page.
     */
	public function get_destroy($staff_id){
		$this->layout->content = View::make('staff.confirm-delete')
			->with('title', 'Confirm Staff Member Deletion')
			->with('staff', Staff::find($staff_id));
	}

    /**
     * Update the staff member to a deleted state.
     */
	public function delete_destroy(){
		Staff::find(Input::get('staff_id'))->update(array(
				'staff_isActive'=>'0',
				'staff_isDeleted'=>'1'
		));
		return Redirect::route('stafflist')
				->with('message', 'The staff member was deleted successfully!');
	}

}