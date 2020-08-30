<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', 'ItemController@index')->name('items.index');

Route::get('/items/create', 'ItemController@create')->name('items.create');

Route::get('/items/{item:name}', 'ItemController@show')->name('items.show');

Route::post('/api/items', 'ItemController@store')->name('items.store');

Route::post('/api/items/{item}/image_upload', 'ItemController@upload')->name('items.upload');

Route::post('/api/items/size', 'SizeController@store')->name('size.store');

Route::get('/addresses/create', 'AddressController@create')->name('address.create');

Route::post('/api/addresses', 'AddressController@store')->name('address.store');

Route::get('/companies/create', 'CompanyController@create')->name('company.create');

Route::post('/api/companies', 'CompanyController@store')->name('company.store');
