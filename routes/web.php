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

/*
Route::get('/', function () {
    return view('index');
})->name('index');*/

Route::get('/', 'Admin\ScriptController@makeList')->name('index');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/scheme_page', 'Admin\ReviewController@getAll')->name('scheme_page');

Route::get('/visa_page', function () {
    return view('visa_page');
})->name('visa_page');

Route::get('/work_page', 'Admin\JobController@viewAll')->name('work_page');
//Route::get('/mails', 'MailController@some');


//Route::get('{locate}', 'LanguageController@index');
/*Route::get('/admin/orders', function () {
    return view('admin.history');
})->name('history');*/


Route::post('/admin/makeListDistricts', 'Admin\DistrictsController@makeList')->name('makeListDistricts');
Route::post('/admin/addNewDistrict', 'Admin\DistrictsController@addNewDistrict')->name('addNewDistrict');
Route::post('/admin/makeListCities', 'Admin\CitiesController@makeList')->name('makeListCities');
Route::post('/admin/addNewCity', 'Admin\CitiesController@addNewCity')->name('addNewCity');
Route::post('/admin/addNewAddress', 'Admin\AddressesController@addNewAddress')->name('addNewAddress');
Route::post('/admin/addNewReason', 'ReasonController@addNewReason')->name('addNewReason');
//Route::get('/pdf', 'Admin\OrdersController@makePDF')->name('makePDF');
Route::get('/admin/orderHistory/{id}', 'Admin\OrdersController@history')->name('history');
Route::get('/admin/clientHistory/{id}', 'Admin\ClientsController@history')->name('history_for_client');
/*Route::post('/sees', 'Admin\NewChangesPolandController@see')->name('sees');
Route::post('/mee', 'Admin\NewChangesUkraineController@see')->name('mee');*/

Route::post('/admin/Timer2', 'Admin\OrdersController@timer')->name('timer2');
Route::post('/admin/Timer3', 'Admin\OrdersController@timer3')->name('timer3');
Route::post('/admin/Timer', 'Admin\NewChangesPolandController@timer')->name('timer');


Route::post('/call', 'CallController@save')->name('call_me');

/*
Route::get('/ru', 'LanguageController@ru')->name('ru');
Route::get('/pl', 'LanguageController@pl')->name('pl');
Route::get('/en', 'LanguageController@en')->name('en');*/


