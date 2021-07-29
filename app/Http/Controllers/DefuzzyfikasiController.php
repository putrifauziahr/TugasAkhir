<?php

namespace App\Http\Controllers;

use App\model\Defuzzyfikasi;
use App\model\Fuzzyfikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefuzzyfikasiController extends Controller
{
    public function showDefuzzy()
    {
        $defuzzy = Defuzzyfikasi::all();
        return view('admin/content/prosesdata/defuzzy', compact('defuzzy'));
    }
    public function tambah(Request $request)
    {
        // $bbh = [];
        // $bth = [];
        // $bah = [];
        // $bbp = [];
        // $btp = [];
        // $bap = [];
        // for ($i = 0; $i < 16; $i++) {
        //     //harapan
        //     $bbh_hasil = Fuzzyfikasi::find('batasBawahHarapan');
        //     array_push($bbh, $bbh_hasil);

        // $bth_hasil = $fuzzy->batasTengahHarapan;
        // array_push($bth, $bth_hasil);

        // $bah_hasil = $fuzzy->batasAtasHarapan;
        // array_push($bah, $bah_hasil);

        // //persepsi
        // $bbp_hasil = $fuzzy->batasBawahPersepsi;
        // array_push($bbp, $bbp_hasil);

        // $btp_hasil = $fuzzy->batasTengahPersepsi;
        // array_push($btp, $btp_hasil);

        // $bap_hasil = $fuzzy->batasAtasPersepsi;
        // array_push($bap, $bap_hasil);
        // }
        // dd($bbh);

        // for ($i = 0; $i < 16; $i++) {

        //     $defuzzy = new Defuzzyfikasi;
        //     $defuzzy->id_fuzzy = $request->id_fuzzy[$i];
        //     $defuzzy->harapan = ($fuzzy->batasBawahHarapan[$i] + $fuzzy->batasTengahHarapan[$i] + $fuzzy->batasAtasHarapan[$i]) / 3;
        //     $defuzzy->persepsi = ($fuzzy->batasBawahPersepsi[$i] + $fuzzy->batasTengahPersepsi[$i]  + $fuzzy->batasAtasPersepsi[$i]) / 3;
        //     $defuzzy->save();
        // }

        for ($i = 0; $i < 16; $i++) {
            // $check = DB::table('defuzzyfikasi')->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=',  'fuzzyfikasi.id_fuzzy')->first();
            // if (!$check) {
            $defuzzy = new Defuzzyfikasi;
            $defuzzy->id_fuzzy = $request->id_fuzzy[$i];
            $defuzzy->harapan = $request->harapan[$i];
            $defuzzy->persepsi = $request->persepsi[$i];
            $defuzzy->save();
            // } 
            // else {
            //     return view('admin/content/prosesdata/fuzzy')->with('alert', 'Tidak Dapat Melakukan Defuzzyfikasi Berulang');
            // }
        }
        return redirect('admin/showDefuzzy')->with('alert', 'Proses Defuzzyfikasi Berhasil');
    }

    public function final()
    {
    }
}
