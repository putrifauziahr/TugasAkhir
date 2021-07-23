<?php

namespace App\Http\Controllers;

use App\model\Fuzzyfikasi;
use App\model\HasilKuisioner;
use Illuminate\Http\Request;

class FuzzyfikasiController extends Controller
{
    public function tambah(Request $request, HasilKuisioner $hasilKuisioner)
    {
        //harapan
        $tp = HasilKuisioner::where('jawabanhar', '=', '1')->count();
        $kp = HasilKuisioner::where('jawabanhar', '=', '2')->count();
        $cp = HasilKuisioner::where('jawabanhar', '=', '3')->count();
        $p = HasilKuisioner::where('jawabanhar', '=', '4')->count();
        $sp = HasilKuisioner::where('jawabanhar', '=', '5')->count();

        //persepsi
        $tpp = HasilKuisioner::where('jawabanper', '=', '1')->count();
        $kpp = HasilKuisioner::where('jawabanper', '=', '2')->count();
        $cpp = HasilKuisioner::where('jawabanper', '=', '3')->count();
        $pp = HasilKuisioner::where('jawabanper', '=', '4')->count();
        $spp = HasilKuisioner::where('jawabanper', '=', '5')->count();

        //fuzzyfikasi
        $hasil = HasilKuisioner::all();
        $jumlah_total = count($hasil);
        // for ($i = 1; $i <= $jumlah_total; $i++) {
        //     $answers[] = [
        $fuzzy = new Fuzzyfikasi;
        $fuzzy->id_hasil = $hasilKuisioner->id_hasil;
        $fuzzy->batasBawahHarapan = ((0 * $tp) + (1 * $kp) + (2 * $cp) + (3 + $p) + (4 * $sp)) / ($tp + $kp + $cp + $p + $sp);
        $fuzzy->batasTengahHarapan = ((1 * $tp) + (2 * $kp) + (3 * $cp) + (4 + $p) + (5 * $sp)) / ($tp + $kp + $cp + $p + $sp);
        $fuzzy->batasAtasHarapan = ((2 * $tp) + (3 * $kp) + (4 * $cp) + (5 + $p) + (5 * $sp)) / ($tp + $kp + $cp + $p + $sp);

        $fuzzy->batasBawahPersepsi = ((0 * $tpp) + (1 * $kpp) + (2 * $cpp) + (3 + $pp) + (4 * $spp)) / ($tpp + $kpp + $cpp + $pp + $spp);
        $fuzzy->batasTengahPersepsi = ((1 * $tpp) + (2 * $kpp) + (3 * $cpp) + (4 + $pp) + (5 * $spp)) / ($tpp + $kpp + $cpp + $pp + $spp);
        $fuzzy->batasAtasPersepsi = ((2 * $tpp) + (3 * $kpp) + (4 * $cpp) + (5 + $pp) + (5 * $spp)) / ($tpp + $kpp + $cpp + $pp + $spp);
        $fuzzy->save();
        //     ];
        // }
        return redirect('admin/showHasilKuis')->with('alert', 'Proses Fuzzyfikasi Berhasil');
    }
}
