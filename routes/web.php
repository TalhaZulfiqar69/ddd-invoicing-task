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

Route::get('/', static function () {
    return 'test';
});

Route::get('invoices/{id}', 'InvoiceController@show');
Route::put('invoices/approve/{id}', 'InvoiceController@approve');
Route::put('invoices/reject/{id}', 'InvoiceController@reject');