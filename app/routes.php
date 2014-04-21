<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Filter for registered staff members for the CMS
Route::filter('registered_cms_user', function()
{
    if (Auth::guest()) 
    {
   		return Redirect::route('cmslogin')
   			->with('error-message', 'Please login!');
    }
});

//Filter for registered staff members for the IMS
Route::filter('registered_ims_user', function()
{
    if (Auth::guest()) 
    {
   		return Redirect::route('imslogin')
   			->with('error-message', 'Please login!');
    }
});

//Filter for registered customers on the official website
Route::filter('registered_frontend_user', function()
{
    if (Auth::guest()) 
    {
   		return Redirect::route('customerlogin')
   			->with('error-message', 'Please login!');
    }
});

//Filter for registered administrators
Route::filter('registered_administrator', function()
{
    if (Auth::user()->getRole()!="Administrator") 
    {
   		return Redirect::route('imshome')
   			->with('error-message', 'Restricted Area!');
    }
});

//Filter for registered administrators and content editors
Route::filter('registered_administrator_contenteditor', function()
{
    if (Auth::user()->getRole()!="Administrator" && Auth::user()->getRole()!="Content Editor") 
    {
   		return Redirect::route('cmshome')
   			->with('error-message', 'Restricted Area!');
    }
});

//Filter for registered administrators and estate agents
Route::filter('registered_administrator_estateagent', function()
{
    if (Auth::user()->getRole()!="Administrator" && Auth::user()->getRole()!="Estate Agent") 
    {
   		return Redirect::route('imshome')
   			->with('error-message', 'Restricted Area!');
    }
});

//Paths accessible to all users
Route::get('/', array('as' => 'home', 'uses' => 'WebsiteController@get_home'));
Route::get('customer/login', ['http', 'as' => 'customerlogin', 'uses' => 'FrontEndCustomersController@get_login']);
Route::get('customer/loggedout', array('as'=>'customerloggedout', 'uses' => 'FrontEndCustomersController@get_logout'));
Route::post('customer/signedin', array('uses'=>'FrontEndCustomersController@post_signedin'));
Route::get('customer/new', array('as'=>'newcustomer', 'uses'=>'FrontEndCustomersController@get_new'));
Route::post('customer/create', array('before'=>'csrf', 'uses'=>'FrontEndCustomersController@post_create'));

Route::get('search', array('uses'=>'SearchController@get_search'));
Route::post('search', array('uses'=>'SearchController@post_search'));

Route::get('page/{page_id}', array('as' => 'webpage', 'uses' => 'FrontEndPagesController@get_view'));
Route::get('about-us', array('as' => 'aboutus', 'uses' => 'FrontEndPagesController@get_aboutus'));

Route::get('properties', array('as'=>'webproperties','uses'=>'FrontEndPropertiesController@get_index'));
Route::get('properties/filtered', array('as'=>'webpropertiesfiltered','uses'=>'FrontEndPropertiesController@get_filteredindex'));
Route::get('property/{property_id}', array('as' => 'webproperty', 'uses' => 'FrontEndPropertiesController@get_view'));

Route::get('query/new', array('as'=>'newquery', 'uses'=>'FrontEndContactUsController@get_new'));
Route::post('query/create', array('before'=>'csrf', 'uses'=>'FrontEndContactUsController@post_create'));

Route::get('/ims', array('as' => 'imshome', 'uses' => 'ImsController@get_home'));
Route::get('ims/staff/login', ['http', 'as' => 'imslogin', 'uses' => 'ImsStaffController@get_login']);
Route::get('ims/staff/loggedout', array('as'=>'imsloggedout', 'uses' => 'ImsStaffController@get_logout'));
Route::post('ims/staff/signedin', array('uses'=>'ImsStaffController@post_signedin'));

Route::get('/cms', array('as' => 'cmshome', 'uses' => 'CmsController@get_home'));
Route::get('cms/staff/login', ['http', 'as' => 'cmslogin', 'uses' => 'CmsStaffController@get_login']);
Route::get('cms/staff/loggedout', array('as'=>'cmsloggedout', 'uses' => 'CmsStaffController@get_logout'));
Route::post('cms/staff/signedin', array('uses'=>'CmsStaffController@post_signedin'));

//Paths accessible only to registered customers on the official website
Route::group(array('before' => 'registered_frontend_user'), function()
{
	Route::get('customerprofile', array('as'=>'customer_profile','uses'=>'FrontEndCustomersController@get_view'));
	Route::get('customerprofile/edit', array('as'=>'edit_customer_profile', 'uses'=>'FrontEndCustomersController@get_edit'));
	Route::put('customerprofile/update', array('before'=>'csrf', 'uses'=>'FrontEndCustomersController@put_update'));
	Route::get('customerprofile/changepassword', array('as'=>'change_customer_profile_password', 'uses'=>'FrontEndCustomersController@get_changepassword'));
	Route::put('customerprofile/updatepassword', array('before'=>'csrf', 'uses'=>'FrontEndCustomersController@put_updatepassword'));

	Route::get('properties/myproperties', array('as'=>'mywebproperties','uses'=>'FrontEndPropertiesController@get_myindex'));

	Route::get('offers', array('as'=>'buyer_offers','uses'=>'FrontEndOffersController@get_index'));
	Route::get('offer/{offer_id}', array('as'=>'buyer_offer','uses'=>'FrontEndOffersController@get_view'));
	Route::get('offers/{property_id}/new', array('as'=>'new_buyer_offer', 'uses'=>'FrontEndOffersController@get_new'));
	Route::post('offers/create', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@post_create'));
	Route::get('offer/{offer_id}/edit', array('as'=>'edit_buyer_offer', 'uses'=>'FrontEndOffersController@get_edit'));
	Route::put('offers/update', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@put_update'));
	Route::put('offers/accept', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@put_accept'));
	Route::put('offers/reject', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@put_reject'));
	Route::put('offers/confirm', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@put_confirm'));	
	Route::delete('offers/delete', array('before'=>'csrf', 'uses'=>'FrontEndOffersController@delete_destroy'));

	Route::post('interests/create', array('as'=>'addwatch', 'before'=>'csrf', 'uses'=>'InterestsController@post_create'));
	Route::delete('interests/delete', array('as'=>'removewatch', 'before'=>'csrf', 'uses'=>'InterestsController@delete_destroy'));
});

//Paths accessible only to staff member roles within the IMS
Route::group(array('before' => 'registered_ims_user'), function()
{
	//Paths accessible only to administrators
	Route::group(array('before' => 'registered_administrator'), function()
	{
		Route::post('ims/newsletter/create', array('before'=>'csrf', 'uses'=>'NewsletterController@post_create'));

		Route::get('ims/customers', array('as'=>'customers','uses'=>'CustomersController@get_index'));
		Route::get('ims/customer/{customer_id}', array('as'=>'customer','uses'=>'CustomersController@get_view'));
		Route::get('ims/customers/buyers', array('as'=>'buyers','uses'=>'CustomersController@get_buyersindex'));
		Route::get('ims/customers/vendors', array('as'=>'vendors','uses'=>'CustomersController@get_vendorsindex'));
		Route::get('ims/customers/new', array('as'=>'new_customer', 'uses'=>'CustomersController@get_new'));
		Route::post('ims/customers/create', array('before'=>'csrf', 'uses'=>'CustomersController@post_create'));
		Route::get('ims/customer/{customer_id}/edit', array('as'=>'edit_customer', 'uses'=>'CustomersController@get_edit'));
		Route::put('ims/customers/update', array('before'=>'csrf', 'uses'=>'CustomersController@put_update'));
		Route::get('ims/customer/{customer_id}/changepassword', array('as'=>'change_customer_password', 'uses'=>'CustomersController@get_changepassword'));
		Route::put('ims/customers/updatepassword', array('before'=>'csrf', 'uses'=>'CustomersController@put_updatepassword'));
		Route::get('ims/customer/{customer_id}/delete', array('as'=>'confirm_customer_delete','uses'=>'CustomersController@get_destroy'));
		Route::delete('ims/customers/delete', array('as'=>'delete_customer','before'=>'csrf', 'uses'=>'CustomersController@delete_destroy'));

		Route::get('ims/staff', array('as'=>'stafflist','uses'=>'ImsStaffController@get_index'));
		Route::get('ims/staffmember/{staff_id}', array('as'=>'staff','uses'=>'ImsStaffController@get_view'));
		Route::get('ims/staff/new', array('as'=>'new_staff', 'uses'=>'ImsStaffController@get_new'));
		Route::post('ims/staff/create', array('before'=>'csrf', 'uses'=>'ImsStaffController@post_create'));
		Route::get('ims/staffmember/{staff_id}/edit', array('as'=>'edit_staff', 'uses'=>'ImsStaffController@get_edit'));
		Route::put('ims/staff/update', array('before'=>'csrf', 'uses'=>'ImsStaffController@put_update'));
		Route::get('ims/staff/{staff_id}/changepassword', array('as'=>'change_staff_password', 'uses'=>'ImsStaffController@get_changepassword'));
		Route::put('ims/staff/updatepassword', array('before'=>'csrf', 'uses'=>'ImsStaffController@put_updatepassword'));
		Route::get('ims/staffmember/{staff_id}/delete', array('as'=>'confirm_staff_delete', 'uses'=>'ImsStaffController@get_destroy'));
		Route::delete('ims/staff/delete', array('before'=>'csrf', 'uses'=>'ImsStaffController@delete_destroy'));

		Route::get('ims/staff_roles', array('as'=>'staff_roles','uses'=>'StaffRolesController@get_index'));
		Route::get('ims/staff_role/{staff_role_id}', array('as'=>'staff_role','uses'=>'StaffRolesController@get_view'));
		Route::get('ims/staff_roles/new', array('as'=>'new_staff_role', 'uses'=>'StaffRolesController@get_new'));
		Route::post('ims/staff_roles/create', array('before'=>'csrf', 'uses'=>'StaffRolesController@post_create'));
		Route::get('ims/staff_role/{staff_role_id}/edit', array('as'=>'edit_staff_role', 'uses'=>'StaffRolesController@get_edit'));
		Route::put('ims/staff_roles/update', array('before'=>'csrf', 'uses'=>'StaffRolesController@put_update'));
		Route::get('ims/staff_role/{staff_role_id}/delete', array('as'=>'confirm_staff_role_delete', 'uses'=>'StaffRolesController@get_destroy'));
		Route::delete('ims/staff_roles/delete', array('before'=>'csrf', 'uses'=>'StaffRolesController@delete_destroy'));

		Route::get('ims/property_types', array('as'=>'property_types','uses'=>'PropertyTypesController@get_index'));
		Route::get('ims/property_type/{property_type_id}', array('as'=>'property_type','uses'=>'PropertyTypesController@get_view'));
		Route::get('ims/property_types/new', array('as'=>'new_property_type', 'uses'=>'PropertyTypesController@get_new'));
		Route::post('ims/property_types/create', array('before'=>'csrf', 'uses'=>'PropertyTypesController@post_create'));
		Route::get('ims/property_type/{property_type_id}/edit', array('as'=>'edit_property_type', 'uses'=>'PropertyTypesController@get_edit'));
		Route::put('ims/property_types/update', array('before'=>'csrf', 'uses'=>'PropertyTypesController@put_update'));
		Route::get('ims/property_type/{property_type_id}/delete', array('as'=>'confirm_property_type_delete','uses'=>'PropertyTypesController@get_destroy'));
		Route::delete('ims/property_types/delete', array('before'=>'csrf', 'uses'=>'PropertyTypesController@delete_destroy'));

		Route::get('ims/property_statuses', array('as'=>'property_statuses','uses'=>'PropertyStatusesController@get_index'));
		Route::get('ims/property_status/{property_status_id}', array('as'=>'property_status','uses'=>'PropertyStatusesController@get_view'));
		Route::get('ims/property_statuses/new', array('as'=>'new_property_status', 'uses'=>'PropertyStatusesController@get_new'));
		Route::post('ims/property_statuses/create', array('before'=>'csrf', 'uses'=>'PropertyStatusesController@post_create'));
		Route::get('ims/property_status/{property_status_id}/edit', array('as'=>'edit_property_status', 'uses'=>'PropertyStatusesController@get_edit'));
		Route::put('ims/property_statuses/update', array('before'=>'csrf', 'uses'=>'PropertyStatusesController@put_update'));
		Route::get('ims/property_status/{property_status_id}/delete', array('as'=>'confirm_property_status_delete','uses'=>'PropertyStatusesController@get_destroy'));
		Route::delete('ims/property_statuses/delete', array('before'=>'csrf', 'uses'=>'PropertyStatusesController@delete_destroy'));

		Route::get('ims/offer_statuses', array('as'=>'offer_statuses','uses'=>'OfferStatusesController@get_index'));
		Route::get('ims/offer_status/{offer_status_id}', array('as'=>'offer_status','uses'=>'OfferStatusesController@get_view'));
		Route::get('ims/offer_statuses/new', array('as'=>'new_offer_status', 'uses'=>'OfferStatusesController@get_new'));
		Route::post('ims/offer_statuses/create', array('before'=>'csrf', 'uses'=>'OfferStatusesController@post_create'));
		Route::get('ims/offer_status/{offer_status_id}/edit', array('as'=>'edit_offer_status', 'uses'=>'OfferStatusesController@get_edit'));
		Route::put('ims/offer_statuses/update', array('before'=>'csrf', 'uses'=>'OfferStatusesController@put_update'));
		Route::get('ims/offer_status/{offer_status_id}/delete', array('as'=>'confirm_offer_status_delete','uses'=>'OfferStatusesController@get_destroy'));
		Route::delete('ims/offer_statuses/delete', array('before'=>'csrf', 'uses'=>'OfferStatusesController@delete_destroy'));
	});

	//Paths accessible only to administrators and estate agents
	Route::group(array('before' => 'registered_administrator_estateagent'), function()
	{
		Route::get('ims/offers', array('as'=>'offers','uses'=>'OffersController@get_index'));
		Route::get('ims/offers/cancelled', array('as'=>'cancelledoffers','uses'=>'OffersController@get_cancelledindex'));
		Route::get('ims/offer/{offer_id}', array('as'=>'offer','uses'=>'OffersController@get_view'));
		Route::get('ims/offers/new', array('as'=>'new_offer', 'uses'=>'OffersController@get_new'));
		Route::post('ims/offers/create', array('before'=>'csrf', 'uses'=>'OffersController@post_create'));
		Route::get('ims/offer/{offer_id}/edit', array('as'=>'edit_offer', 'uses'=>'OffersController@get_edit'));
		Route::put('ims/offers/update', array('before'=>'csrf', 'uses'=>'OffersController@put_update'));
		Route::get('ims/offer/{offer_id}/delete', array('as'=>'confirm_offer_delete','uses'=>'OffersController@get_destroy'));
		Route::delete('ims/offers/delete', array('before'=>'csrf', 'uses'=>'OffersController@delete_destroy'));
	});
});

//Paths accessible only to staff member roles within the CMS
Route::group(array('before' => 'registered_cms_user'), function()
{
	//Paths accessible only to administrators and estate agents
	Route::group(array('before' => 'registered_administrator_estateagent'), function()
	{
		Route::get('cms/properties', array('as'=>'properties','uses'=>'PropertiesController@get_index'));
		Route::get('cms/properties/forsale', array('as'=>'propertiesforsale','uses'=>'PropertiesController@get_forsaleindex'));
		Route::get('cms/properties/soldstc', array('as'=>'stcproperties','uses'=>'PropertiesController@get_soldstcindex'));
		Route::get('cms/properties/sold', array('as'=>'soldproperties','uses'=>'PropertiesController@get_soldindex'));
		Route::get('cms/property/{property_id}', array('as'=>'property','uses'=>'PropertiesController@get_view'));
		Route::get('cms/properties/new', array('as'=>'new_property', 'uses'=>'PropertiesController@get_new'));
		Route::post('cms/properties/create', array('before'=>'csrf', 'uses'=>'PropertiesController@post_create'));
		Route::get('cms/property/{property_id}/edit', array('as'=>'edit_property', 'uses'=>'PropertiesController@get_edit'));
		Route::put('cms/properties/update', array('before'=>'csrf', 'uses'=>'PropertiesController@put_update'));
		Route::get('cms/property/{property_id}/delete', array('as'=>'confirm_property_delete','uses'=>'PropertiesController@get_destroy'));
		Route::delete('cms/properties/delete', array('before'=>'csrf', 'uses'=>'PropertiesController@delete_destroy'));
	});

	//Paths accessible only to administrators and content editors
	Route::group(array('before' => 'registered_administrator_contenteditor'), function()
	{
		Route::get('cms/images', array('as'=>'images','uses'=>'ImagesController@get_mainindex'));
		Route::get('cms/images/add', array('as'=>'new_images','uses'=>'ImagesController@get_upload'));
		Route::post('cms/images/upload', array('uses'=>'ImagesController@post_upload'));
		Route::get('cms/images/{property_id}', array('as'=>'propertyimages','uses'=>'ImagesController@get_propertyindex'));
		Route::put('cms/images/setasprimary/{property_id}/{image_id}', array('before'=>'csrf', 'uses'=>'ImagesController@put_setPrimary'));
		Route::delete('cms/images/delete/{image_id}', array('before'=>'csrf', 'uses'=>'ImagesController@delete_destroy'));

		Route::get('cms/banner_images', array('as'=>'banner_images','uses'=>'BannerImagesController@get_mainindex'));
		Route::get('cms/banner_images/add', array('as'=>'new_banner_images','uses'=>'BannerImagesController@get_upload'));
		Route::post('cms/banner_images/upload', array('uses'=>'BannerImagesController@post_upload'));
		Route::delete('cms/banner_images/delete/{banner_image_id}', array('before'=>'csrf', 'uses'=>'BannerImagesController@delete_destroy'));

		Route::get('cms/pages', array('as'=>'pages','uses'=>'PagesController@get_index'));
		Route::get('cms/page/{page_id}', array('as'=>'page','uses'=>'PagesController@get_view'));
		Route::get('cms/pages/new', array('as'=>'new_page', 'uses'=>'PagesController@get_new'));
		Route::post('cms/pages/create', array('before'=>'csrf', 'uses'=>'PagesController@post_create'));
		Route::get('cms/page/{page_id}/edit', array('as'=>'edit_page', 'uses'=>'PagesController@get_edit'));
		Route::put('cms/pages/update', array('before'=>'csrf', 'uses'=>'PagesController@put_update'));
		Route::get('cms/page/{page_id}/delete', array('as'=>'confirm_page_delete','uses'=>'PagesController@get_destroy'));
		Route::delete('cms/pages/delete', array('as'=>'delete_page','before'=>'csrf', 'uses'=>'PagesController@delete_destroy'));
	});
});