<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', 'SaleController@index');
Route::post('store', 'SaleController@store')->name('sale.store');
Route::post('update', 'SaleController@update')->name('sale.update');
Route::post('destory', 'SaleController@destory')->name('sale.destory');

// Get all sales
Route::get('list', 'SaleController@getSales');