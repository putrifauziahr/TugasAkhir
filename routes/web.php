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

//Kategori
Route::get('admin/showKategori', 'KategoriController@index')->name('admin/showKategori');
Route::post('admin/tambahKategori', 'KategoriController@tambahKategori')->name('admin/tambahKategori');
Route::get('admin/hapusKategori/{kategori}', 'KategoriController@hapusKategori')->name('admin/hapusKategori');
Route::get('admin/showDetailKategori/{kategori}', 'KategoriController@showDetailKategori')->name('guru/showDetailKategori');
Route::match(['get', 'post'], 'admin/postUpdateKategori/{id_kategori}', 'KategoriController@postUpdateKategori')->name('admin/postUpdateKategori');

//Kelompok Tani
Route::get('admin/showKelompokTani', 'KelompokTaniController@index')->name('admin/showKelompokTani');
Route::post('admin/tambahKelompokTani', 'KelompokTaniController@tambahKelompokTani')->name('admin/tambahKelompokTani');
Route::get('admin/hapusKelompokTani/{poktan}', 'KelompokTaniController@hapusKelompokTani')->name('admin/hapusKelompokTani');
Route::get('admin/showDetailKelompokTani/{poktan}', 'KelompokTaniController@showDetailKelompokTani')->name('guru/showDetailKelompokTani');
Route::match(['get', 'post'], 'admin/postUpdateKelompokTani/{id_kategori}', 'KelompokTaniController@postUpdateKelompokTani')->name('admin/postUpdateKelompokTani');
