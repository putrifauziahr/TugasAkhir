<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBerandaController extends Controller
{
    public function showPenyuluhan()
    {
        return view('petani/content/beranda/penyuluhan');
    }

    public function showDetailPenyuluhan()
    {
        return view('petani/content/beranda/penyuluhan');
    }

    public function showKontak()
    {
        return view('petani/content/beranda/kontak');
    }

    public function showTentang()
    {
        return view('petani/content/beranda/tentang');
    }
}
