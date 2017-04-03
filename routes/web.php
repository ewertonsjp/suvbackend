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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/{id}', 'InvoiceController@show') -> where('id', '[0-9]+');
Route::get('/invoice/listAsJson', 'InvoiceController@listAsJson');
Route::post('/invoice', 'InvoiceController@close');

Route::get('/transaction/create', 'TransactionController@create');
Route::post('/transaction', 'TransactionController@add');
// Route::post('/transaction/add', 'TransactionController@add');

Route::get('/family', 'FamilyController@index');
Route::get('/family/create', 'FamilyController@create');
Route::post('/family', 'FamilyController@store');
Route::get('/family/listAsJson', 'FamilyController@listAsJson');
