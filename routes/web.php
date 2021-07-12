<?php

use Illuminate\Support\Facades\Route;
use App\model\Penyuluhan;


Route::get('/', function () {
    $penyuluhan = Penyuluhan::all();
    return view('petani/content/beranda/home', compact('penyuluhan'));
});

//Login Admin
Route::get('admin/login', 'AdminController@login')->name('admin/login');
Route::post('admin/login', 'AdminController@loginProses')->name('admin/loginProses');
Route::get('admin/register', 'AdminController@register')->name('admin/register');
Route::post('admin/registerProses', 'AdminController@registerProses')->name('admin/registerProses');

//logout
Route::get('logout', 'AdminController@logout')->name('logout');
Route::get('logoutPetani', 'UserPetaniController@logout')->name('logoutPetani');


//Login Petani
Route::get('petani/login', 'UserPetaniController@login')->name('petani/login');
Route::post('petani/login', 'UserPetaniController@loginProses')->name('petani/login');


//===========ADMIN===============

Route::group(['middleware' => ['CheckLoginAdmin']], function () {
    //dashboard
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin/dashboard');

    //Desa
    Route::get('admin/showDesa', 'DesaController@index')->name('admin/showDesa')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahDesa', 'DesaController@tambahDesa')->name('admin/tambahDesa');
    Route::get('admin/hapusDesa/{desa}', 'DesaController@hapusDesa')->name('admin/hapusDesa');
    Route::get('admin/showDetailDesa/{desa}', 'DesaController@showDetailDesa')->name('guru/showDetailDesa');
    Route::match(['get', 'post'], 'admin/postUpdateDesa/{kode_desa}', 'DesaController@postUpdateDesa')->name('admin/postUpdateDesa');

    //Kategori
    Route::get('admin/showKategori', 'KategoriController@index')->name('admin/showKategori')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahKategori', 'KategoriController@tambahKategori')->name('admin/tambahKategori');
    Route::get('admin/hapusKategori/{kategori}', 'KategoriController@hapusKategori')->name('admin/hapusKategori');
    Route::get('admin/showDetailKategori/{kategori}', 'KategoriController@showDetailKategori')->name('guru/showDetailKategori');
    Route::match(['get', 'post'], 'admin/postUpdateKategori/{id_kategori}', 'KategoriController@postUpdateKategori')->name('admin/postUpdateKategori');

    //Kelompok Tani
    Route::get('admin/showKelompokTani', 'KelompokTaniController@index')->name('admin/showKelompokTani')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahKelompokTani', 'KelompokTaniController@tambahKelompokTani')->name('admin/tambahKelompokTani');
    Route::get('admin/hapusKelompokTani/{poktan}', 'KelompokTaniController@hapusKelompokTani')->name('admin/hapusKelompokTani');
    Route::get('admin/showDetailKelompokTani/{poktan}', 'KelompokTaniController@showDetailKelompokTani')->name('admin/showDetailKelompokTani');
    Route::match(['get', 'post'], 'admin/postUpdateKelompokTani/{id_poktan}', 'KelompokTaniController@postUpdateKelompokTani')->name('admin/postUpdateKelompokTani');

    //Kuisioner
    Route::get('admin/showKuisioner', 'KuisionerController@index')->name('admin/showKuisioner')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahKuisioner', 'KuisionerController@tambahKuisioner')->name('admin/tambahKuisioner');
    Route::get('admin/hapusKuisioner/{kuis}', 'KuisionerController@hapusKuisioner')->name('admin/hapusKuisioner');
    Route::get('admin/viewDetailKuisioner/{kuis}', 'KuisionerController@viewDetailKuisioner')->name('admin/viewDetailKuisioner');
    Route::get('admin/showDetailKuisioner/{kuis}', 'KuisionerController@showDetailKuisioner')->name('admin/showDetailKuisioner');
    Route::match(['get', 'post'], 'admin/postUpdateKuisioner/{id_kuis}', 'KuisionerController@postUpdateKuisioner')->name('admin/postUpdateKuisioner');

    //Petani
    Route::get('admin/showPetani', 'PetaniController@index')->name('admin/showPetani')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahPetani', 'PetaniController@tambahPetani')->name('admin/tambahPetani');
    Route::get('admin/hapusPetani/{petani}', 'PetaniController@hapusPetani')->name('admin/hapusPetani');
    Route::get('admin/viewDetailPetani/{petani}', 'PetaniController@viewDetailPetani')->name('admin/viewDetailPetani');
    Route::get('admin/showDetailPetani/{petani}', 'PetaniController@showDetailPetani')->name('admin/showDetailPetani');
    Route::match(['get', 'post'], 'admin/postUpdatePetani/{id_petani}', 'PetaniController@postUpdatePetani')->name('admin/postUpdatePetani');

    //Penyuluhan
    Route::get('admin/showPenyuluhan', 'PenyuluhanController@index')->name('admin/showPenyuluhan')->middleware('CheckLoginAdmin');
    Route::post('admin/tambahPenyuluhan', 'PenyuluhanController@tambahPenyuluhan')->name('admin/tambahPenyuluhan');
    Route::get('admin/hapusPenyuluhan/{penyuluhan}', 'PenyuluhanController@hapusPenyuluhan')->name('admin/hapusPenyuluhan');
    Route::get('admin/viewDetailPenyuluhan/{penyuluhan}', 'PenyuluhanController@viewDetailPenyuluhan')->name('admin/viewDetailPenyuluhan');
    Route::get('admin/showDetailPenyuluhan/{penyuluhan}', 'PenyuluhanController@showDetailPenyuluhan')->name('admin/showDetailPenyuluhan');
    Route::match(['get', 'post'], 'admin/postUpdatePenyuluhan/{id_penyuluhan}', 'PenyuluhanController@postUpdatePenyuluhan')->name('admin/postUpdatePenyuluhan');

    //Profil Admin
    Route::get('admin/showProfil/{id_admin}', 'AdminController@showProfil')->name('admin/showProfil');
    Route::match(['get', 'post'], 'admin/postUpdateProfil/{id_admin}', 'AdminController@postUpdateProfil')->name('admin/postProfil');
    Route::match(['get', 'post'], 'admin/updateFotoProfil/{id_admin}', 'AdminController@updateFotoProfil')->name('admin/updateFotoProfil');
});


//============PETANI==========
//beranda
Route::get('beranda/showDetailPenyuluhan/{penyuluhan}', 'UserBerandaController@showDetailPenyuluhan')->name('beranda/showDetailPenyuluhan');
Route::get('beranda/showTentang', 'UserBerandaController@showTentang')->name('beranda/showTentang');
Route::get('beranda/showPenyuluhan', 'UserBerandaController@showPenyuluhan')->name('beranda/showPenyuluhan');
Route::get('petani/showDetailPenyuluhan/{penyuluhan}', 'UserBerandaController@showDetailPenyuluhan')->name('beranda/showDetailPenyuluhan');
Route::get('beranda/showkontak', 'UserBerandaController@showKontak')->name('beranda/showKontak');

Route::group(['middleware' => ['CheckLoginPetani']], function () {

    //dashboard petani
    Route::get('petani/dashboard', 'UserPetaniController@dashboard')->name('petani/dashboard');

    //penyuluhan
    Route::get('petani/showPenyuluhan', 'UserPetaniController@showPenyuluhan')->name('petani/showPenyuluhan')->middleware('CheckLoginPetani');
    Route::get('petani/showDetailPenyuluhan/{penyuluhan}', 'UserPetaniController@showDetailPenyuluhan')->name('petani/showDetailPenyuluhan');

    //kuisioner
    Route::get('petani/showKuisioner', 'UserPetaniController@showKuisioner')->name('petani/showKuisioner');
    Route::post('petani/postTambahKuisioner', 'UserPetaniController@postTambahKuisioner')->name('petani/postTambahKuisioner');

    //profil
    Route::get('petani/showProfil/{id_petani}', 'UserPetaniController@showProfil')->name('petani/showProfil');
    Route::match(['get', 'post'], 'petani/updateFotoProfil/{id_petani}', 'UserPetaniController@updateFotoProfil')->name('petani/updateFotoProfil');
    Route::match(['get', 'post'], 'petani/postUpdateProfil/{id_petani}', 'UserPetaniController@postUpdateProfil')->name('petani/postProfil');
});
