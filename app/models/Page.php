<?php

/* Page Model Class */

class Page extends Eloquent {

    //Database table
	protected $table = 'pages';

    //Primary key of the pages table
	protected $primaryKey  = 'page_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('page_id','page_title', 'page_content', 'page_isPublished', 'page_isDeleted');

	/**
	 * Validate page creation method.
	 *
	 * @return object Validator
	 */
	public static function validate_create()
	{
		$create_page_rules = array(
		 	'page_title'=>'Required|Min:2|Unique:pages,page_title',
		 	'page_content'=>'Required|Min:20'
		);

		$create_page_messages = array(
    		'page_title.unique' => 'Provided Page Title is already in use'
		);

		return Validator::make(Input::all(), $create_page_rules, $create_page_messages);
	}

	/**
	 * Validate page modification method.
	 *
	 * @return object Validator
	 */
	public static function validate_edit($page_id)
	{
		$edit_page_rules = array(
		 	'page_title'=>'Required|Min:2|Unique:pages,page_title,'.$page_id.',page_id',
		 	'page_content'=>'Required|Min:20'
		);

		$edit_page_messages = array(
    		'page_title.unique' => 'Provided Page Title is already in use'
		);

		return Validator::make(Input::all(), $edit_page_rules, $edit_page_messages);
	}

}