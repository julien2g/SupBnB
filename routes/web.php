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


Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
//Route::get('/home', 'HomeController@index')->name('/');


Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);
Route::get('/addHome', [ // FORMS ADD
    'as' => 'addHome',
    'uses' => 'HomeController@addHome'
]);

Route::post('/createHome', [
    'as' => 'createHome',
    'uses' => 'HomeController@createHome'
]);
Route::get('/book/add', [
    'as' => 'book/add',
    'uses' => 'BookController@addBook'
]);
Route::get('/myBooking', [
    'as' => 'myBooking',
    'uses' => 'BookController@bookingFetch'
]);

Route::get('/detailsHome/{slug}', [
    'as' => 'detailsHome',
    'uses' => 'HomeController@detailsHome'
]);
Route::get('/sort/{type}/{data}', [
    'as' => 'sort',
    'uses' => 'HomeController@sortHome'
]);
Route::match(['get', 'post'], '/updateHomme/{slug}', [
    'as' => 'updateHome',
    'uses' => 'HomeController@updateHome'
]);

Route::post('/upload', [
    'as' => 'upload',
    'uses' => 'HomeController@store'
]);

Route::get('booking/accepted/{id}', [
    'as' => 'booking/accepted',
    'uses' => 'BookController@acceptBooking'
]);
Route::get('booking/refused/{id}', [
    'as' => 'booking/refused',
    'uses' => 'BookController@refusedBooking'
]);
