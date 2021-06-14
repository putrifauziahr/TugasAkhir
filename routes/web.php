<?php

use Illuminate\Support\Facades\Route;
use App\model\Kategori;
use App\model\KelompokTani;
use App\model\Kuisioner;
use App\model\Penyuluhan;
use App\model\Petani;


Route::get('/', function () {
    return view('welcome');
});
//Dashboard Admin dan Petani

Route::get('petani/dashboard', function () {
    if (session('berhasil_login')) {
        return view('petani.content.index');
    } else {
        return redirect('/petani/login');
    }
});

Route::get('admin/dashboard', function () {
    if (session('berhasil_login')) {
        $petani = Petani::count();
        $kategori = Kategori::count();
        $kuis = Kuisioner::count();
        $poktan = KelompokTani::count();
        $penyuluhan = Penyuluhan::count();
        return view('admin.content.index', compact('kuis', 'kategori', 'poktan', 'petani', 'penyuluhan'));
    } else {
        return redirect('/admin/login');
    }
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

Route::group(['middleware' => ['CheckLoginAdmin']], function () {
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
});


//============PETANI==========
Route::get('petani/showKuisioner', 'UserPetaniController@showKuisioner')->name('petani/showKuisioner');
Route::get('petani/showProfil/{id_petani}', 'UserPetaniController@showProfil')->name('petani/showProfil');
Route::match(['get', 'post'], 'petani/postUpdateProfil/{id_petani}', 'UserPetaniController@postUpdateProfil')->name('petani/postProfil');
//==========UMUM==========