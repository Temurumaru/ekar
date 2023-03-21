<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
	return view('home');
}) -> name('home');

Route::get('/product', function () {
	return view('product');
}) -> name('product');

Route::get('/product_single', function () {
	return view('product_single');
}) -> name('product_single');

Route::get('/installment', function () {
	return view('installment');
}) -> name('installment');

Route::get('/charging_stations', function () {
	return view('charging_stations');
}) -> name('charging_stations');

Route::get('/contact', function () {
	return view('contact');
}) -> name('contact');

Route::get('/about', function () {
	return view('about');
}) -> name('about');

Route::post(
	'get_stamp_cars',
	'App\Http\Controllers\UserController@getStampCars'
) -> name('getStampCarsC');


// Admin section

Route::get('/admin', function () {
	if(isset($_SESSION['admin'])) { 
		return view('admin.admin');
	} else {
		return view('admin.admin_signin');
	}
}) -> name('admin');

Route::post(
	'/sign_in_admin_c',
	'App\Http\Controllers\AdminController@signInAdmin'
) -> name('signInAdminC');

if(isset($_SESSION['admin'])) {


	Route::get('/admin_add_car', function () {
		return view('admin.admin_add_car');
	}) -> name('admin_add_car');

	Route::get('/admin_add_stamp', function () {
		return view('admin.admin_add_stamp');
	}) -> name('admin_add_stamp');

	Route::get('/admin_upd_stamp', function () {
		return view('admin.admin_upd_stamp');
	}) -> name('admin_upd_stamp');

	Route::get('/admin_upd_slider', function () {
		return view('admin.admin_upd_slider');
	}) -> name('admin_upd_slider');

	Route::get('/admin_upd_data', function () {
		return view('admin.admin_upd_data');
	}) -> name('admin_upd_data');

	// Route::get('/admin_sponsors', function () {
	// 	return view('admin.admin_sponsors');
	// }) -> name('admin_sponsors');

	Route::get('/admin_upd_car', function () {
		return view('admin.admin_upd_car');
	}) -> name('admin_upd_car');


	// Route::post(
	// 	'/upd_post_on_sponsors_c',
	// 	'App\Http\Controllers\AdminController@updPostOnSponsors'
	// ) -> name('updPostOnSponsorsC');

	Route::post(
		'add_car',
		'App\Http\Controllers\AdminController@addCar'
	) -> name('addCarC');

	Route::post(
		'upd_car',
		'App\Http\Controllers\AdminController@updCar'
	) -> name('updCarC');


	Route::post(
		'add_stamp',
		'App\Http\Controllers\AdminController@addStamp'
	) -> name('addStampC');

	Route::post(
		'upd_stamp',
		'App\Http\Controllers\AdminController@updStamp'
	) -> name('updStampC');
	
	Route::post(
		'upd_slider',
		'App\Http\Controllers\AdminController@updSlider'
	) -> name('updSliderC');
	
	Route::post(
		'/upd_data_c',
		'App\Http\Controllers\AdminController@updData'
	) -> name('updDataC');

	Route::post(
		'admin_text_page_upd_c',
		'App\Http\Controllers\AdminController@updTextPage'
	) -> name('updTextPageC');

	Route::delete(
		'del_car',
		'App\Http\Controllers\AdminController@delCar'
	) -> name('delCarC');

	Route::delete(
		'del_stamp',
		'App\Http\Controllers\AdminController@delStamp'
	) -> name('delStampC');
	
	if($_SESSION['admin'] -> level >= 5) {
		Route::get('/admin_creator', function () {
			return view('admin.admin_creator');
		}) -> name('admin_creator');

		Route::post(
			'/add_admin_c',
			'App\Http\Controllers\AdminController@addAdmin'
		) -> name('addAdminC');

		Route::delete(
			'/del_admin_c',
			'App\Http\Controllers\AdminController@delAdmin'
		) -> name('delAdminC');
	}
}