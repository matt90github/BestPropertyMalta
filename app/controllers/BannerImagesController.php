<?php

//Banner Images Controller Class

class BannerImagesController extends BaseController {

    //Enable restful feature
	public $restful = true;

    //Define the controller layout 
	protected $layout = "layouts.cmslayout";

    /**
     * Show the banner images index page.
     */
	public function get_mainindex(){
        
		$this->layout->content = View::make('banner_images.index')
			->with('title', 'List of Images')
			->with('bannerImages', Banner_Image::orderBy ('created_at', 'desc')
									->paginate('6'));
	}

    /**
     * Show the banner images upload page.
     */
	public function get_upload(){

		$this->layout->content = View::make('banner_images.upload')
			->with('title', 'Add New Images');
	}

    /**
     * Upload the banner images.
     */
 	public function post_upload()
    {
        $files = Input::file('file');
        $serializedFile = array();

        foreach ($files as $file) {
            // Validate files from input file
            $validation = Banner_Image::validateBannerImage(array('file'=> $file));

            if (!$validation->fails() && $file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/bannerImages';

                    // Move file to generated folder
                    $file->move($destinationPath, $fileName);

                    // Resize image (using Intervention Image Class)
                    BImage::make($destinationPath . '/' . $fileName)
                        ->resize(1135, 250)
                        ->save($destinationPath . '/' . $fileName);

                    Banner_Image::create(array(
                		'banner_image_name' => $fileName,
               		 	'created_at' => date('Y-m-d H:i:s'),
                		'updated_at' => date('Y-m-d H:i:s')
            		));
            }

            else {
                   return Redirect::route('new_banner_images')
                        ->with('status', 'alert-danger')
                        ->with('image-message', 'There was a problem uploading your 
                                                 image(s)!');
            }
        }
        
        return Redirect::route('new_banner_images')
              ->with('status', 'alert-success')
              ->with('image-message', 
                     'Your image(s) were successfully uploaded');
    } 

    /**
     * Delete the banner images.
     */
    public function delete_destroy($bannerImageId)
    {
        Banner_Image::find($bannerImageId)->delete();

        return Redirect::back()
                ->with('status', 'alert-success')
                ->with('message', 'Image removed successfully');
    }
}