<?php

namespace App\Http\Controllers;

use App\model\Penyuluhan;
use Illuminate\Http\Request;

class UserBerandaController extends Controller
{
    public function showPenyuluhan()
    {
        $penyuluhan = Penyuluhan::where('status', "Belum Dilaksanakan");
        return view('petani/content/beranda/penyuluhan', compact('penyuluhan'));
    }

    public function showDetailPenyuluhan(Penyuluhan $penyuluhan)
    {
        return view('petani/content/beranda/penyuluhanDetail', compact('penyuluhan'));
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
