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

Route::get('/clear_all', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
	Artisan::call('route:cache');
	
    return "Cache Cleared..!";
});

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function() {
    // Home
    Route::get('/home', 'SchoolController@home');
    Route::post('/schools-list', 'SchoolController@getSchoolList');
    Route::get('/school/{school_id}', 'SchoolController@schoolFinalPrice');
    Route::post('/school/{school_id}', 'SchoolController@getGradeFinalPrice');

    // Schools Actual Price
    Route::get('/schools-actual-price', 'SchoolController@schoolsActualPrice')->name('school.list');
    Route::get('/schools-actual-price/{school_id}', 'SchoolController@schoolGrades')->name('school.grade');
    Route::post('/school-grade/{school_id}', 'SchoolController@getSchoolGrades');
    Route::post('/update-actual-price', 'SchoolController@updateActualPrice');

    // School Price Limit
    Route::get('/school-price-limit', 'SchoolController@schoolPriceLimit');
    Route::post('/school-price-limit', 'SchoolController@getSchoolPriceLimit')->name('school.price_limit');
    Route::post('/update-price-limit', 'SchoolController@updatePriceLimit');

    // Discount Matrix
    Route::get('/discount-matrix', 'SchoolController@discountMatrix');
    Route::post('/discount-matrix', 'SchoolController@getDiscountMatrix');
    Route::post('/update-discount-matrix', 'SchoolController@updateDiscountMatrix');
});