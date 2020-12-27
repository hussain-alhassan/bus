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

Route::get('/trips/depart', 'traveler\TripController@depart')->name('depart');
Route::get('/trips/return', 'traveler\TripController@return')->name('return');
Route::get('/trips/checkout', 'traveler\TripController@checkout')->name('checkout');
Route::get('/trips/book', 'traveler\TripController@book')->name('book');
Auth::routes();

Route::group(['middleware'=>'auth'],function () {
    Route::get('/trips', 'traveler\TripController@show')->name('trips');
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
    Route::get('/profile', 'agent\AgentController@profile')->name('agency.profile');
    Route::post('/profile/{agency}/update', 'agent\AgentController@update');

    // Booking protected routes
    Route::group(['middleware' => 'own.agency'], function() {
        Route::get('/{booking}/approve', 'agent\BookingController@approve')->name('approve_booking');
        Route::get('/{booking}/pend', 'agent\BookingController@pend')->name('pend_booking');
        Route::get('/{booking}/reject', 'agent\BookingController@reject')->name('reject_booking');
    });

    // buses unprotected routes
    Route::resource('buses', 'agent\BusController')->only(['index', 'create', 'store']);

    // buses protected routes
    Route::group(['middleware' => 'owned.by.agent'], function() {
        Route::resource('buses', 'agent\BusController')->except(['index', 'create', 'store']);
    });

    Route::resource('trips', 'agent\TripController')->only(['index', 'create', 'store']);
    Route::group(['middleware' => 'owned.by.agent'], function() {
        Route::resource('trips', 'agent\TripController')->except(['index', 'create', 'store']);
    });

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

    Route::resource('agencies', 'admin\AgencyController');
});
/////////// End of Admin section //////////////
