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

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/konsultasi', 'HomeController@konsultasi')->name('konsultasi');

Route::get('/search', 'SearchController@index')->name('search');
Route::get('/cari', 'SearchController@cari')->name('cari');

Route::get('/users', 'HomeController@users')->name('users');

Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');
Route::get('/private-messages/{user}', 'MessageController@privateMessages')->name('privateMessages');
Route::post('/private-messages/{user}', 'MessageController@sendPrivateMessage')->name('privateMessages.store');

Route::resource('obat','ObatController');
Route::resource('apotekProfil','ApotekProfilController');

Route::get('/apotek', 'ApotekController@index')->name('apotek');
