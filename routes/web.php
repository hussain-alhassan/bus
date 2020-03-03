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
Route::get('/about', 'HomeController@about')->name('about_us');

Route::get('/trips/search', 'traveler\TripController@search')->name('my_trip');
Auth::routes();

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'traveler\TripController@show');
});

/*///////////// Traveler Section //////////////*/

Route::group(['middleware' => 'traveler'], function() {
    Route::resource('/travel', 'traveler\TravelerController');
});
/////// End of Traveler section //////////////


/*///////////// Agent Section //////////////*/

Route::group(['prefix' => 'agent', 'middleware' => 'agent'], function() {
    Route::resource('dashboard', 'agent\AgentController');
    Route::resource('bookings', 'agent\BookingController');
    Route::get('/profile', 'agent\AgentController@profile');
    Route::post('/profile/{agency}/update', 'agent\AgentController@update');
});
/////////// End of Agent section //////////////

/*///////////// Admin Section //////////////*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('dashboard', 'admin\AdminController');
    Route::get('cities', 'admin\CityController@showCities')->name('cities');
    Route::get('city/create', 'admin\CityController@create');
    Route::post('city/store', 'admin\CityController@store');
    Route::get('city/{city}/edit', 'admin\CityController@edit');
    Route::post('city/{city}/update', 'admin\CityController@update');
    Route::get('city/{city}/activate', 'admin\CityController@activate');
    Route::get('city/{city}/disable', 'admin\CityController@disable');
});
/////////// End of Admin section //////////////
