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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/schools-list', 'HomeController@getSchoolList')->name('home');
});