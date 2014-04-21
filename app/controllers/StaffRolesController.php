<?php

//IMS Staff Role Controller Class

class StaffRolesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.imslayout";

    /**
     * Show the IMS's staff role index page.
     */
	public function get_index(){

		$allstaffroles = DB::table('staff_roles')->orderBy('staff_role_name')->paginate(10);

		$this->layout->content = View::make('staff_roles.index')
			->with('title', 'List of Staff Roles')
			->with('staff_roles', $allstaffroles);
	}


    /**
     * Show the IMS's staff role details page.
     */
	public function get_view($staff_role_id){

		if (Staff_Role::find($staff_role_id) != null) {

			$staff_roleId = Staff_Role::find($staff_role_id);
			
			$this->layout->content = View::make('staff_roles.view')
				->with('title', 'Staff Role View Page')
				->with('staff_role', Staff_Role::find($staff_role_id));
		}
		else
			return Redirect::route('staff_roles')
				->with('error-message', 'Requested Staff Role was not found');
	}


    /**
     * Show the IMS's staff role creation page.
     */
	public function get_new(){

		$staff_role = array('' => 'Select One') + 
			Staff_Role::lists('staff_role_name', 'staff_role_id');

		$this->layout->content = View::make('staff_roles.new')
			->with('title', 'Add New Staff Role')
			->with('staff_roleId',$staff_role);
	}

    /**
     * Validate and create the staff role.
     */
	public function post_create(){
	
		$validation = Staff_Role::validate_create();

		if($validation->fails()) {
		 	return Redirect::route('new_staff_role')
		 		->withErrors($validation)
		 		->withInput();
		}

		else {
			Staff_Role::create(array(
				'staff_role_name'=>Input::get('staff_role_name'),
				'staff_role_description'=>Input::get('staff_role_description')
			));

			return Redirect::route('staff_roles')
				->with('message', 'The staff role was created successfully!');
		}
	}


    /**
     * Show the IMS's staff role modification page.
     */
	public function get_edit($staff_role_id){
		if(Staff_Role::find($staff_role_id)!=null){
			$this->layout->content = View::make('staff_roles.edit')
				->with('title', 'Edit Staff Role')
				->with('staff_role', Staff_Role::find($staff_role_id));
		}
		else{
			return Redirect::route('staff_roles')
				->with('error-message', 'Requested Staff Role was not found');
		}
	}

    /**
     * Validate and edit the staff role.
     */
	public function put_update(){
		$staff_role_id = Input::get('staff_role_id');

		$validation = Staff_Role::validate_edit($staff_role_id);

		if($validation->fails()) {
	 		return Redirect::route('edit_staff_role', $staff_role_id)
	 			->withErrors($validation);
		}

		else {
			Staff_Role::find($staff_role_id)->update(array(
				'staff_role_name'=>Input::get('staff_role_name'),
				'staff_role_description'=>Input::get('staff_role_description')
			));

			return Redirect::route('staff_role', $staff_role_id)
				->with('message', 'The staff role was updated successfully!');			
		}
	}


    /**
     * Show the IMS's staff role deletion page.
     */
	public function get_destroy($staff_roleId){
		$this->layout->content = View::make('staff_roles.confirm-delete')
			->with('title', 'Confirm Staff Role Deletion')
			->with('staff_role', Staff_Role::find($staff_roleId));
	}

    /**
     * Delete the staff role.
     */
	public function delete_destroy(){
		Staff_Role::find(Input::get('staff_role_id'))->delete();
		return Redirect::route('staff_roles')
				->with('message', 'The staff role was deleted successfully!');
	}

}