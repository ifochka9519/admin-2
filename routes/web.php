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


Route::get('/', function () {
    return view('welcome');
});


Route::post('/admin/makeListDistricts', 'Admin\DistrictsController@makeList')->name('makeListDistricts');
Route::post('/admin/addNewDistrict', 'Admin\DistrictsController@addNewDistrict')->name('addNewDistrict');
Route::post('/admin/makeListCities', 'Admin\CitiesController@makeList')->name('makeListCities');
Route::post('/admin/addNewCity', 'Admin\CitiesController@addNewCity')->name('addNewCity');
Route::post('/admin/addNewAddress', 'Admin\AddressesController@addNewAddress')->name('addNewAddress');
Route::get('/pdf', 'Admin\OrdersController@makePDF')->name('makePDF');
