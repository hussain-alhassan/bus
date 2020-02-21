<?php

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('aboutus');
Route::get('/trips/search', 'traveler\TripController@search')->name('my_trip');
Auth::routes();

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'traveler\TripController@show');
});
//
//
/*///////////// Traveler Section //////////////*/

Route::group(['middleware' => 'traveler'], function() {
    Route::resource('/travel', 'traveler\TravelerController');
//    Route::get('/trips', 'traveler\TripController@show');
});
/////// End of Traveler section //////////////
//
/*///////////// Agent Section //////////////*/

Route::group(['prefix' => 'agent', 'middleware' => 'agent'], function() {
    Route::resource('dashboard', 'agent\AgentController');
});
/////////// End of Agent section //////////////
//
//
//
/*///////////// Admin Section //////////////*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('dashboard', 'admin\AdminController');
});
/////////// End of Admin section //////////////
