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
Route::get('/', array('uses' =>'HomeController@hello', 'as' => 'home'));

Route::group(array('prefix' => 'about'), function() 
{
	Route::get('/',array('uses' =>'AboutController@index', 'as' => 'getAbout'));
});

Route::group(array('prefix' => 'services'), function() 
{
	Route::get('/',array('uses' =>'ServicesController@index', 'as' => 'getServices'));
});

Route::group(array('prefix' => 'gallery'), function() 
{
	Route::get('/',array('uses' =>'GalleryController@index', 'as' => 'getGallery'));
});

Route::group(array('prefix' => 'news'), function() 
{
	Route::get('/',array('uses' =>'NewsController@index', 'as' => 'getNews'));
});

Route::group(array('prefix' => 'testimonials'), function() 
{
	Route::get('/',array('uses' =>'TestimonialsController@index', 'as' => 'getTestimonials'));
});

Route::group(array('prefix' => 'contact-us'), function() 
{
	Route::get('/',array('uses' =>'ContactController@index', 'as' => 'getContact'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/send-msg', array('uses' => 'ContactController@sendContactMsg', 'as' => 'sendContactMsg'));
	});
});

Route::group(array('prefix' => 'reservation'), function() 
{
	Route::get('/',array('uses' =>'ReservationController@index', 'as' => 'getReservation'));
	Route::get('/step2/{id}',array('uses' =>'ReservationController@getReservation_step2', 'as' => 'getReservation_step2'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/getCottageType',array('uses' =>'ReservationController@getCottageType', 'as' => 'getCottageType'));
		Route::post('/getCottagelist',array('uses' =>'ReservationController@getCottagelist', 'as' => 'getCottagelist'));
		Route::post('/compute',array('uses' =>'ReservationController@compute', 'as' => 'compute'));
		Route::post('/postReservation',array('uses' =>'ReservationController@postReservation', 'as' => 'postReservation'));
		
	});
});

Route::group(array('before' => 'guest'), function() 
{
	Route::get('/user/create',array('uses' =>'UserController@getCreate', 'as' => 'getCreate'));
	Route::get('/user/login',array('uses' =>'UserController@getLogin', 'as' => 'getLogin'));

	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
		Route::post('/user/login',array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
	});
});

Route::group(array('prefix' => 'register'), function() 
{
	Route::get('/',array('uses' =>'UserController@getCreate', 'as' => 'getCreate'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
	});
});

Route::group(array('prefix' => '/confirmation'),function()
{
	Route::get('/{code}/{id}', array('uses' => 'ConfirmationController@confirmation','as' => 'confirmation'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
});
//added by jerbey--- for filemaintenance
Route::group(array('prefix' => 'admin'), function() 
{
	Route::get('/',array('uses' =>'FileMaintenanceController@getFM', 'as' => 'getFM'));
	Route::get('/banners',array('uses' =>'FileMaintenanceController@getBanners', 'as' => 'getBanners'));
	Route::get('/reservation-info/{id}',array('uses' =>'FileMaintenanceController@getReserve', 'as' => 'getReserve'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/saveInfo',array('uses' =>'FileMaintenanceController@saveInfo', 'as' => 'saveInfo'));
		Route::post('/getEditInfo',array('uses' =>'FileMaintenanceController@getEditInfo', 'as' => 'getEditInfo'));
		Route::post('/deleteInfo',array('uses' =>'FileMaintenanceController@deleteInfo', 'as' => 'deleteInfo'));
		Route::post('/updateInfo',array('uses' =>'FileMaintenanceController@updateInfo', 'as' => 'updateInfo'));

		Route::post('/saveBannerInfo',array('uses' =>'FileMaintenanceController@saveBannerInfo', 'as' => 'saveBannerInfo'));
		Route::post('/getEditBannerInfo',array('uses' =>'FileMaintenanceController@getEditBannerInfo', 'as' => 'getEditBannerInfo'));
		Route::post('/deleteBannerInfo',array('uses' =>'FileMaintenanceController@deleteBannerInfo', 'as' => 'deleteBannerInfo'));
		Route::post('/updateBannerInfo',array('uses' =>'FileMaintenanceController@updateBannerInfo', 'as' => 'updateBannerInfo'));


		Route::post('/getCottageList',array('uses' =>'ReservationController@getCottageList', 'as' => 'getCottageList'));
	});
});

Route::group(array('prefix' => '/ajax'),function()
{
	
	Route::group(array('before' => 'csrf'), function()
	{
		Route::get('/loginAjax', array('uses' => 'UserController@loginAjax','as' => 'loginAjax'));
	});
});
//end