<?php

namespace App\Http\Controllers;

use App\model\Fuzzyfikasi;
use App\model\HasilKuisioner;
use App\model\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuzzyfikasiController extends Controller
{
    public function showFuzzy()
    {
        $fuzzy = Fuzzyfikasi::all();
        return view('admin/content/prosesdata/fuzzy', compact('fuzzy'));
    }
    public function tambah(Request $request, HasilKuisioner $hasilKuisioner)
    {
        //harapan : tidak puas
        $tp = [];
        //harapan : kurang puas
        $kp = [];
        //harapan : cukup puas
        $cp = [];
        //harapan : puas
        $p = [];
        //harapan : sangat puas
        $sp = [];

        //persepsi : tidak puas
        $tpp = [];
        //persepsi : kurang puas
        $kpp = [];
        //persepsi : cukup puas
        $cpp = [];
        //persepsi : puas
        $pp = [];
        //persepsi : sangat puas
        $spp = [];
        for ($i = 1; $i <= 16; $i++) {
            //persepsi
            $tpp_count = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanper', '=', '1')->count();
            array_push($tpp, $tpp_count);

            $kpp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanper', '=', '2')->count();
            array_push($kpp, $kpp_count);

            $cpp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanper', '=', '3')->count();
            array_push($cpp, $cpp_count);

            $pp_count   = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanper', '=', '4')->count();
            array_push($pp, $pp_count);

            $spp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanper', '=', '5')->count();
            array_push($spp, $spp_count);

            //harapan
            $tp_count = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanhar', '=', '1')->count();
            array_push($tp, $tp_count);

            $kp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanhar', '=', '2')->count();
            array_push($kp, $kp_count);

            $cp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanhar', '=', '3')->count();
            array_push($cp, $cp_count);

            $p_count   = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanhar', '=', '4')->count();
            array_push($p, $p_count);

            $sp_count  = DB::table('hasil_kuisioners')->where('id_kuis', '=', $i)->where('jawabanhar', '=', '5')->count();
            array_push($sp, $sp_count);
        }

        for ($j = 0; $j < 16; $j++) {
            $fuzzy = new Fuzzyfikasi();
            $fuzzy->id_hasil = $request->id_hasil[$j];
            //harapan
            $fuzzy->batasBawahHarapan = (((0 * $tp[$j]) + (1 * $kp[$j]) + (2 * $cp[$j]) + (3 * $p[$j]) + (4 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j]));
            $fuzzy->batasTengahHarapan = (((1 * $tp[$j]) + (2 * $kp[$j]) + (3 * $cp[$j]) + (4 * $p[$j]) + (5 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j]));
            $fuzzy->batasAtasHarapan = (((2 * $tp[$j]) + (3 * $kp[$j]) + (4 * $cp[$j]) + (5 * $p[$j]) + (5 * $sp[$j])) / ($tp[$j] + $kp[$j] + $cp[$j] + $p[$j] + $sp[$j]));

            //persepsi
            $fuzzy->batasBawahPersepsi = (((0 * $tpp[$j]) + (1 * $kpp[$j]) + (2 * $cpp[$j]) + (3 * $pp[$j]) + (4 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j]));
            $fuzzy->batasTengahPersepsi = (((1 * $tpp[$j]) + (2 * $kpp[$j]) + (3 * $cpp[$j]) + (4 * $pp[$j]) + (5 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j]));
            $fuzzy->batasAtasPersepsi = (((2 * $tpp[$j]) + (3 * $kpp[$j]) + (4 * $cpp[$j]) + (5 * $pp[$j]) + (5 * $spp[$j])) / ($tpp[$j] + $kpp[$j] + $cpp[$j] + $pp[$j] + $spp[$j]));
            $fuzzy->save();
        }
        return redirect('admin/showFuzzy')->with('alert', 'Proses Fuzzyfikasi Berhasil');
    }
}
