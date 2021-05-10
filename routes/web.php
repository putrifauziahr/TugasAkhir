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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin/dashboard');
Route::get('admin/showKategori', 'KategoriController@index')->name('admin/showKategori');
Route::get('admin/showKelompokTani', 'KelompokTaniController@index')->name('admin/showKelompokTani');
