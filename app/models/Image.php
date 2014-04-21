<?php

/* Property Image Model Class */

class Image extends Eloquent {

    //Database table
	protected $table = 'images';

    //Primary key of the image table
	protected $primaryKey  = 'image_id';

    //The fillable property specifies which attributes should be mass-assignable
	protected $fillable = array('image_id','image_name', 'image_propertyId', 'image_isPrimary');

    /**
     * Get the id of the property image.
     *
     * @return int
     */
	public function getImageId()
    {
    	return $this->image_id;
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
     * Validate image method.
     *
     * @param  file $data
     * @return object Validator
     */
    public static function validateImage($data)
    {
        return Validator::make($data, static::$rules);
    }

    /**
     * Relation with properties table.
     *
     * @return void
     */
    public function property()
    {
        return $this->belongsTo('Property', 'property_id');
    }

}