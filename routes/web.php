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
Route::get('petani/dashboard', 'UserPetaniController@dashboard')->name('petani/dashboard');
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
Route::get('admin/showDetailKelompokTani/{poktan}', 'KelompokTaniController@showDetailKelompokTani')->name('admin/showDetailKelompokTani');
Route::match(['get', 'post'], 'admin/postUpdateKelompokTani/{id_poktan}', 'KelompokTaniController@postUpdateKelompokTani')->name('admin/postUpdateKelompokTani');

//Kuisioner
Route::get('admin/showKuisioner', 'KuisionerController@index')->name('admin/showKuisioner');
Route::post('admin/tambahKuisioner', 'KuisionerController@tambahKuisioner')->name('admin/tambahKuisioner');
Route::get('admin/hapusKuisioner/{kuis}', 'KuisionerController@hapusKuisioner')->name('admin/hapusKuisioner');
Route::get('admin/showDetailKuisioner/{kuis}', 'KuisionerController@showDetailKuisioner')->name('admin/showDetailKuisioner');
Route::match(['get', 'post'], 'admin/postUpdateKuisioner/{id_kuis}', 'KuisionerController@postUpdateKuisioner')->name('admin/postUpdateKuisioner');

//Petani
Route::get('admin/showPetani', 'PetaniController@index')->name('admin/showPetani');
Route::post('admin/tambahPetani', 'PetaniController@tambahPetani')->name('admin/tambahPetani');
Route::get('admin/hapusPetani', 'PetaniController@hapusPetani')->name('admin/hapusPetani');
Route::get('admin/showDetailPetani', 'PetaniController@showDetailPetani')->name('admin/showDetailPetani');
Route::match(['get', 'post'], 'admin/postUpdatePetani', 'PetaniController@postUpdatePetani')->name('admin/postUpdatePetani');

//Penyuluhan
Route::get('admin/showPenyuluhan', 'PenyuluhanController@index')->name('admin/showPenyuluhan');
Route::post('admin/tambahPenyuluhan', 'PenyuluhanController@tambahPenyuluhan')->name('admin/tambahPenyuluhan');
Route::get('admin/hapusPenyuluhan', 'PenyuluhanController@hapusPenyuluhan')->name('admin/hapusPenyuluhan');
Route::get('admin/showDetailPenyuluhan', 'PenyuluhanController@showDetailPenyuluhan')->name('admin/showDetailPenyuluhan');
Route::match(['get', 'post'], 'admin/postUpdatePenyuluhan', 'PenyuluhanController@postUpdatePenyuluhan')->name('admin/postUpdatePenyuluhan');
