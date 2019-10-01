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



Auth::routes();

Route::get('/homepeople', 'HomeController@people')->name('homepeople');

Route::get('/homedokter', 'HomeController@dokter')->name('homedokter');


Route::get('/konsultasidokter', 'HomeController@konsultasiDokter')->name('konsultasiDokter');
Route::get('/konsultasipeople', 'HomeController@konsultasiPeople')->name('konsultasiPeople');

Route::get('/users', 'HomeController@users')->name('users');

Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');
Route::get('/private-messages/{user}', 'MessageController@privateMessages')->name('privateMessages');
Route::post('/private-messages/{user}', 'MessageController@sendPrivateMessage')->name('privateMessages.store');
