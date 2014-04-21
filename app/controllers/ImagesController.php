<?php

//CMS Property Image Controller Class

class ImagesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the CMS's property image index page.
     */
	public function get_mainindex(){
        
        $property_name = array('' => 'Select One') + 
            Property::where('property_isDeleted', '!=', '1')
                    ->where('property_isActive', '1')
                    ->orderBy('property_id')->get()->lists('full_name', 'property_id');

		$this->layout->content = View::make('images.index')
			->with('title', 'List of Property Images')
            ->with('isMain', '1')
			->with('images', Image::orderBy('created_at', 'desc')
									->paginate('42'))
            ->with('propertyName', $property_name);
	}

    /**
     * Show the CMS's property image index page filtered by property.
     */
	public function get_propertyindex($propertyId){

        $property_name = array('' => 'Select One') + 
            Property::where('property_isDeleted', '!=', '1')
                    ->where('property_isActive', '1')
                    ->orderBy('property_id')->get()->lists('full_name', 'property_id');

		$this->layout->content = View::make('images.index')
			->with('title', 'Property Images')
            ->with('isMain', '0')
            ->with('propertyName', $property_name)
			->with('images', Image::orderBy('created_at', 'desc')
									->where('image_propertyId', $propertyId)
									->paginate('42'));
	}

    /**
     * Show the CMS's property image upload page.
     */
	public function get_upload(){

        $property_name = array('' => 'Select One') + 
            Property::where('property_isDeleted', '!=', '1')
                    ->where('property_isActive', '1')
                    ->orderBy('property_id')->get()->lists('full_name', 'property_id');

		$this->layout->content = View::make('images.upload')
			->with('title', 'Add New Images')
            ->with('propertyName', $property_name);


	}

    /**
     * Validate and upload the property image(s).
     */
 	public function post_upload()
    {
    	$propertyId = Input::get('property_name');

        $validation = Property::validate_upload();

        if($validation->fails()) {
            return Redirect::route('new_images')
                ->withErrors($validation);
        }

        else {

            $files = Input::file('file');
            $serializedFile = array();

            foreach ($files as $file) {
                // Validate files from input file
                $validation = Image::validateImage(array('file'=> $file));

                if (!$validation->fails() && $file->isValid()) {
                    $fileName        = $file->getClientOriginalName();
                    $extension       = $file->getClientOriginalExtension();
                    $folderName      = $propertyId;
                    $destinationPath = 'uploads/' . $folderName;

                    // Move file to generated folder
                    $file->move($destinationPath, $fileName);

                    Image::create(array(
                		'image_propertyId' => $propertyId,
                		'image_name' => $fileName,
               		 	'created_at' => date('Y-m-d H:i:s'),
                		'updated_at' => date('Y-m-d H:i:s')
            		));

                } else {
                    return Redirect::route('new_images')
                            ->with('status', 'alert-danger')
                            ->with('image-message', 'There was a problem uploading your image(s)!');
                }

                $serializedFile[] = $folderName;
            }

            return Redirect::route('new_images')
                            ->with('status', 'alert-success')
                            ->with('files', $serializedFile)
                            ->with('image-message', 'Your image(s) were successfully uploaded');
        }
    }

    /**
     * Get the property relating to a particular image.
     */
    private function get_property($imageId)
    {
        $image = Image::findOrFail($imageId);

        if (! ($image->property_id == 0 || empty($image->properties->property_name))) {
            return $image->properties->property_name;
        } else {
            return 'Property name not found';
        }
    }

    /**
     * Delete a property image.
     */
    public function delete_destroy($imageId)
    {
        Image::find($imageId)->delete();

        return Redirect::back()
                ->with('status', 'alert-success')
                ->with('message', 'Image removed successfully');
    }

    /**
     * Set one of the property images as the primary image.
     */
    public function put_setPrimary($property_id, $image_id){

        $propertyimages = DB::table('images')->where('image_propertyId', '=', $property_id)->get();

        if($propertyimages!=null){
            foreach ($propertyimages as $propertyimage) {
                if($propertyimage->image_isPrimary == '1')
                    Image::find($propertyimage->image_id)->update(array(
                        'image_isPrimary'=>'0'
                    ));
            }

            Image::find($image_id)->update(array(
               'image_isPrimary'=>'1'
            ));

            return Redirect::back()
               ->with('message', 'The primary image was successfully set!');
        }

        else {
            return Redirect::back()
               ->with('error-message', 'Could not set primary image!');
        }

    }

}