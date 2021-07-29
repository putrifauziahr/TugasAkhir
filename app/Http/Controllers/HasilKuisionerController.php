<?php

namespace App\Http\Controllers;

use App\model\HasilKuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilKuisionerController extends Controller
{
    public function index()
    {
        // $hasil = DB::table('hasil_kuisioners')
        //     ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
        //     ->where('penyuluhan.status', '=', 'Sedang Dilaksanakan')
        //     ->get();
        $hasil = HasilKuisioner::all();
        return view('admin/content/hasilkuis/index', compact('hasil'));
    }
}
