<?php


Route::get('/', function() {
	return view('home');
});

Route::get('customer', 'CustomerController@all');
Route::get('customer/{id}', 'CustomerController@details');
Route::get('customer/{id}/edit', 'CustomerController@edit');
Route::get('customer/{id}/newInvoice', 'CustomerController@addInvoice');


Route::get('item', 'ItemController@all');


Route::get('invoice', 'InvoiceController@all');
Route::get('invoice/{id}', 'InvoiceController@details');
Route::post('invoice/{id}/addItem', 'InvoiceController@add');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
