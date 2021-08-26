<?php

Auth::routes();

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function(){

	Route::get('profiles/login/{id}', 'ProfilesController@loginById');

	Route::resource('users', 'UsersController');
	Route::resource('blog', 'BlogController');
	Route::resource('blog', 'BlogController');
	Route::resource('blog_categories', 'BlogCategoriesController');
	Route::resource('blog_authors', 'BlogAuthorsController');
	Route::resource('blog_comments', 'BlogCommentsController');
	Route::resource('subscribers', 'SubscribersController');
	Route::resource('quickadd', 'QuickAddController');
	Route::resource('messages', 'MessagesController');
	Route::resource('join_requests', 'JoinRequestsController');
	Route::resource('job-applications', 'JobApplicationsController');
	
	Route::post('settings/upload', 'SettingsController@postUpload');
	Route::post('settings/save', 'SettingsController@postSave');
	Route::get('settings/switch-boolean', 'SettingsController@getSwitchBoolean');
	Route::get('settings/delete-logo', 'SettingsController@getDeleteLogo');
	Route::get('settings', 'SettingsController@getIndex');
	Route::post('settings/changepassword', 'SettingsController@postChangepassword');
	
	Route::get('compose', 'ComposeController@index');
	Route::get('compose/new', 'ComposeController@getNew');
	Route::post('compose/new', 'ComposeController@postNew');
	Route::post('compose/reply', 'ComposeController@postReply');
	Route::get('compose/bulk', 'ComposeController@getBulk');
	Route::post('compose/bulk', 'ComposeController@postBulk');
	
	Route::get('quickadd/blog/category', 'QuickAddController@getBlogCategory');
	Route::get('quickadd/blog/author', 'QuickAddController@getBlogAuthor');
	Route::get('/', 'DashboardController@index');
});

Route::group(['prefix' => '/', 'namespace'=>'Front'], function() {

	Route::get('blog/search', 'BlogController@search');
	Route::get('blog/{slug}', 'BlogController@show');
	Route::get('blog/category/{slug}', 'BlogController@category');
	Route::get('blog/tag/{tag}', 'BlogController@tag');
	Route::get('blog/comment-status/{slug}', 'BlogController@commentStatus');
	Route::get('blog/author/{slug}', 'BlogController@author');
	Route::get('blog', 'BlogController@index');
	Route::post('blog/comments', 'BlogController@postComments');

	Route::get('about', 'HomeController@about');
	Route::get('how-it-works', 'HomeController@howItWorks');
	Route::get('pricing', 'HomeController@pricing');
	Route::get('contact', 'HomeController@contact');
	Route::get('faq', 'HomeController@faq');
	Route::get('app', 'HomeController@app');
	Route::get('qr', 'HomeController@qr');
	Route::get('clients', 'HomeController@clients');
	Route::get('careers', 'HomeController@careers');
	Route::get('invoicing', 'HomeController@invoicing');
	Route::get('privacy-policy', 'HomeController@privacyPolicy');
	Route::get('terms-conditions', 'HomeController@termsConditions');

	Route::post('subscribe', 'ActionsController@postSubscribe');
	Route::post('enquiry', 'ActionsController@postEnquiry');
	Route::post('workWithUs', 'ActionsController@joinAsAccountant');
	Route::post('clientJoinRequest', 'ActionsController@clientJoinRequest');
	Route::get('unsubscribe', 'ActionsController@getUnsubscribe');
	Route::get('request-status', 'ActionsController@requestStatus');
	
	Route::get('signup', 'HomeController@signup');
	Route::get('join', 'HomeController@joinAsClient');

	Route::get('job-application', 'JobsController@apply');
	Route::post('job-application', 'JobsController@saveApplication');
	Route::get('application-status', 'JobsController@applicationStatus');

	Route::get('/jobapp/preview/{id}', function ($id) {
	    $app = \App\JobApplication::findOrFail($id);
    	return new \App\Mail\JobApplicationReceived($app);
	});
    Route::get('home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
});
