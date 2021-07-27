<?php

namespace App\Http\Controllers;

use App\model\Fuzzyfikasi;
use App\model\HasilKuisioner;
use App\model\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuzzyfikasiController extends Controller
{
    public function tambah(Request $request, HasilKuisioner $hasilKuisioner)
    {
        //harapan
        //soal 1
        $tp = [];
        $kp = [];
        $cp = [];
        $p = [];
        $sp = [];
        $tpp = [];
        $kpp = [];
        $cpp = [];
        $pp = [];
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

        dd($cpp);

        //Fuzzyfikasi        
        $tp = [];
        $kp = [];
        $cp = [];
        $p = [];
        $sp = [];
        $tpp = [];
        $kpp = [];
        $cpp = [];
        $pp = [];
        $spp = [];
        for ($i = 1; $i <= 16; $i++) {
            $fuzzy = new Fuzzyfikasi();
            $fuzzy->id_hasil[] = $request->id_hasil;
            $fuzzy->batasBawahHarapan[] = ((0 * $tp[$i]) + (1 * $kp[$i]) + (2 * $cp . $i) + (3 + $p . $i) + (4 * $sp . $i)) / ($tp . $i + $kp . $i + $cp . $i + $p . $i + $sp . $i);
            $fuzzy->batasTengahHarapan[] = ((1 * $tp[$i]) + (2 * $kp . $i) + (3 * $cp . $i) + (4 + $p . $i) + (5 * $sp . $i)) / ($tp . $i + $kp . $i + $cp . $i + $p . $i + $sp . $i);
            $fuzzy->batasAtasHarapan[] = ((2 * $tp[$i]) + (3 * $kp . $i) + (4 * $cp . $i) + (5 + $p . $i) + (5 * $sp . $i)) / ($tp . $i + $kp . $i + $cp . $i + $p . $i + $sp . $i);

            $fuzzy->batasBawahPersepsi[] = ((0 * $tpp . $i) + (1 * $kpp . $i) + (2 * $cpp . $i) + (3 + $pp . $i) + (4 * $spp . $i)) / ($tpp . $i + $kpp . $i + $cpp . $i + $pp . $i + $spp . $i);
            $fuzzy->batasTengahPersepsi[] = ((1 * $tpp . $i) + (2 * $kpp . $i) + (3 * $cpp . $i) + (4 + $pp . $i) + (5 * $spp . $i)) / ($tpp . $i + $kpp . $i + $cpp . $i + $pp . $i + $spp . $i);
            $fuzzy->batasAtasPersepsi[] = ((2 * $tpp . $i) + (3 * $kpp . $i) + (4 * $cpp . $i) + (5 + $pp . $i) + (5 * $spp . $i)) / ($tpp . $i + $kpp . $i + $cpp . $i + $pp . $i + $spp . $i);
            $fuzzy->save();

            return redirect('admin/showHasilKuis')->with('alert', 'Proses Fuzzyfikasi Berhasil');
        }
    }
}
