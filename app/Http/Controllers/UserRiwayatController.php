<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserRiwayatController extends Controller
{
    public function index($id_petani)
    {
        $riwayat = DB::table('hasil_kuisioners')
            ->join('petanis', 'hasil_kuisioners.id_petani', '=', 'petanis.id_petani')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->where('petanis.id_petani', $id_petani)
            ->get();
        return view('petani/content/kuisioner/riwayat', compact('riwayat'));
    }
}
