<?php

/* Banner Image Model Class */

class Banner_Image extends Eloquent {

    //Database table
	protected $table = 'banner_images';

    //Primary key of the banner_images table
	protected $primaryKey  = 'banner_image_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('banner_image_id','banner_image_name');

    /**
     * Get the id of the banner image.
     *
     * @return int
     */
	public function getBannerImageId()
    {
    	return $this->banner_image_id;
    }

    /**
     * Upload image validation rules.
     * File must be of type image and has a maximum size of 2048KB
     *
     * @var array
     */
    public static $rules = array(
        'file' => 'image|max:2048'
    );

    /**
     * Validate banner image method.
     *
     * @param  file $data
     * @return object Validator
     */
    public static function validateBannerImage($data)
    {
        return Validator::make($data, static::$rules);
    }

}