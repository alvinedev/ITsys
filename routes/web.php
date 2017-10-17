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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','PagesController@index')->name('home');
Route::get('/home','PagesController@home');
Route::get('/search','MiscsController@disSearch');
Route::get('/history','MiscsController@disHistory');
Route::get('/history/view/{id}','MiscsController@viewHistory');
/*Route::get('ipinventory/getsub/{id}',function(){

});*/
Route::POST('/subsearching','MiscsController@subsearch');

Route::POST('/searching','MiscsController@getSearch');
Route::POST('/getsub','IpinventoriesController@getSubject');
Route::POST('/getip','IpinventoriesController@getIpadd');

Route::resource('subjects','SubjectsController');
Route::resource('ipinventory','IpinventoriesController');
Route::resource('reports','ReportsController');
Route::resource('ipaddress','IpaddressesController');

//login, register, logout

Route::get('/register','RegistrationsController@create');
Route::post('/register','RegistrationsController@store');

Route::get('/logout','SessionsController@destroy');