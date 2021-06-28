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
Route::get('/book','BookController@index')->name('book.index');
Route::get('/book/create','BookController@create')->name('book.create');
Route::post('/book/store', 'BookController@store')->name('book.store');
Route::delete('/book/{id}', 'BookController@destroy')->name('book.destroy');
Route::get('/book/{id}/edit', 'BookController@edit')->name('book.edit');
Route::put('/book/{id}', 'BookController@update')->name('book.update');

Route::get('/book-pdf', 'BookController@printBookPdf')->name('book.print-pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
