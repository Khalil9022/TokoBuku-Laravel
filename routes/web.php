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

Route::get('/', 'Utama@index');
Route::post('/pushData', 'Utama@store');
Route::get('/getData', 'Utama@getData');

Route::get('/Login', 'Login@index');
Route::post('/Daftar', 'Login@register');
Route::post('/Masuk', 'Login@masuk');
Route::get('/Logout', 'Login@logout');

Route::post('/AddCart', 'Order@order');
Route::get('/Keranjang', 'Order@keranjang');
