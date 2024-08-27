<?php

use Illuminate\Support\Facades\Route;

# Admin Routes
# Admin Auth
Route::get('/admin-auth', '\App\Http\Controllers\AdminController@getAdminAuth')->name('getAdminAuth');
Route::post('/admin-auth', '\App\Http\Controllers\AdminController@postAdminAuth')->name('postAdminAuth');
Route::middleware(['adminAuth'])->group(function () {
    # Admin Dashboard
    Route::get('/dashboard', '\App\Http\Controllers\AdminController@getDashboard')->name('getDashboard');
    Route::get('/list-of-orders', '\App\Http\Controllers\AdminController@getListOfOrders')->name('getListOfOrders');
    Route::get('/advertisings', '\App\Http\Controllers\AdvertisingController@getAdvertisings')->name('getAdvertisings');
    Route::post('/advertisings', '\App\Http\Controllers\AdvertisingController@postAdvertisings')->name('postAdvertisings');
    Route::get('/logout', '\App\Http\Controllers\AdminController@logout')->name('logout');
});


# User Routes
Route::get('/', function () {
    return view('home');
});
Route::post('/store', '\App\Http\Controllers\OrderController@store')->name('store');

Route::get('/sheet', '\App\Http\Controllers\GoogleSheetController@index')->name('index');
Route::get('/sheet2', '\App\Http\Controllers\GoogleSheetController@index2')->name('index2');
