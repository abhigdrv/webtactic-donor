<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('artisan_cmd', function () {

    \Artisan::call('make:model Report -c -m');

    dd("Executed");

});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['isadmin','auth']], function () {
	Route::get('/admin', 'CategoryController@dashboard');
	Route::get('/admin/category', 'CategoryController@view');
	Route::post('/admin/category', 'CategoryController@store');
	Route::get('/admin/subcategory', 'SubcategoryController@view');
	Route::post('/admin/subcategory', 'SubcategoryController@store');
	Route::get('/admin/donation', 'DonationController@view');
	Route::post('/admin/donation', 'DonationController@store');
	Route::post('/admin/edit-donation', 'DonationController@update');
	Route::post('/admin/upload-donor', 'DonationController@import');
	Route::post('admin/add-donar', 'DonarController@store');
	Route::get('admin/add-user', 'RoleController@add_user');
	Route::get('admin/delete-user/{id}', 'RoleController@delete_user');
	Route::post('admin/add-user', 'RoleController@store_user');
	Route::get('admin/report', 'ReportController@report');
	Route::get('admin/donor-wise-report', 'ReportController@donor_wise_report');
	Route::get('admin/category-wise-report', 'ReportController@category_wise_report');
	Route::get('admin/subcategory-wise-report', 'ReportController@subcategory_wise_report');
	Route::get('admin/date-wise-report', 'ReportController@date_wise_report');
	Route::get('admin/week-wise-report', 'ReportController@week_wise_report');
	Route::get('admin/custom-date-wise-report', 'ReportController@custom_date_wise_report');
	Route::get('admin/area-wise-report', 'ReportController@area_wise_report');
	Route::get('admin/add-subcategory-by-ajax', 'SubcategoryController@ajaxstore');
	Route::get('admin/edit-category-by-ajax', 'CategoryController@ajaxedit');
	Route::get('admin/edit-subcategory-by-ajax', 'SubcategoryController@ajaxedit');
	Route::get('admin/delete-category-by-ajax', 'CategoryController@ajaxdelete');
	Route::get('admin/delete-subcategory-by-ajax', 'SubcategoryController@ajaxdelete');
	Route::get('admin/get-subcategory', 'CategoryController@ajaxgetsubcategory');
	Route::get('admin/single-donation/{id}', 'DonationController@single_donation');
	Route::get('admin/edit-donation/{id}', 'DonationController@edit_donation');
	Route::get('admin/delete-donation/{id}', 'DonationController@delete_donation');
	Route::get('admin/add-donar', 'DonarController@view');
});