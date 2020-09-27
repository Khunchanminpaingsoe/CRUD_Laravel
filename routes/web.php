<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'productController@index')->name('product.index');
Route::get('/products/create', 'productController@create')->name('product.create');
Route::post('/products/create', 'productController@store')->name('product.store');
Route::get('/products/edit/{id}', 'productController@edit')->name('product.edit');
Route::post('/products/edit/{id}', 'productController@update')->name('product.update');
Route::get('/products/delete/{id}', 'productController@delete')->name('product.delete');
Route::get('/products/show/{id}', 'productController@show')->name('product.show');
