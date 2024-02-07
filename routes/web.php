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

// Redirect root to home
Route::redirect('/', '/home');

// Authentication routes
Auth::routes(['verify' => true]);

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Home
    Route::get('/home', 'SchoolController@home')->name('home');

    // Schools
    Route::post('/schools-list', 'SchoolController@getSchoolList');
    Route::get('/school/{school_id}', 'SchoolController@schoolFinalPrice')->name('school.final_price');
    Route::post('/school/{school_id}', 'SchoolController@getGradeFinalPrice')->name('school.grade_final_price');

    // Schools Actual Price
    Route::get('/schools-actual-price', 'SchoolController@schoolsActualPrice')->name('school.list');
    Route::get('/schools-actual-price/{school_id}', 'SchoolController@schoolGrades')->name('school.grade');
    Route::post('/school-grade/{school_id}', 'SchoolController@getSchoolGrades')->name('school.get_grades');
    Route::post('/update-actual-price', 'SchoolController@updateActualPrice')->name('school.update_actual_price');
    Route::post('/add-new-school', 'SchoolController@addNewSchool')->name('add.new_school');
    Route::post('/delete-school', 'SchoolController@deleteSchool')->name('delete.school');
    Route::post('/update-school', 'SchoolController@updateSchool')->name('update.school');

    // School Price Limit
    Route::get('/school-price-limit', 'SchoolController@schoolPriceLimit')->name('school.price_limit');
    Route::post('/school-price-limit', 'SchoolController@getSchoolPriceLimit')->name('school.get_price_limit');
    Route::post('/update-price-limit', 'SchoolController@updatePriceLimit')->name('school.update_price_limit');

    // Discount Matrix
    Route::get('/discount-matrix', 'SchoolController@discountMatrix')->name('school.discount_matrix');
    Route::post('/discount-matrix', 'SchoolController@getDiscountMatrix')->name('school.get_discount_matrix');
    Route::post('/update-discount-matrix', 'SchoolController@updateDiscountMatrix')->name('school.update_discount_matrix');
});