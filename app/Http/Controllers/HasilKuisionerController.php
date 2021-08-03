<?php

namespace App\Http\Controllers;

use App\model\HasilKuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilKuisionerController extends Controller
{
    public function index()
    {
        $hasil = DB::table('hasil_kuisioners')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
            ->get();
        // $hasil = HasilKuisioner::all();
        return view('admin/content/hasilkuis/index', compact('hasil'));
    }

    public function index2()
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

        //fuzzyfikasi
        $bbh = [];
        $bth = [];
        $bah = [];
        $bbp = [];
        $btp = [];
        $bap = [];
        $defuzzyh = [];
        $defuzzyp = [];

        for ($i = 1; $i <= 16; $i++) {
            $tpp_count = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanper', '=', '1')->count();
            array_push($tpp, $tpp_count);

            $kpp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanper', '=', '2')->count();
            array_push($kpp, $kpp_count);

            $cpp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanper', '=', '3')->count();
            array_push($cpp, $cpp_count);

            $pp_count   = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanper', '=', '4')->count();
            array_push($pp, $pp_count);

            $spp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanper', '=', '5')->count();
            array_push($spp, $spp_count);

            //harapan
            $tp_count = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanhar', '=', '1')->count();
            array_push($tp, $tp_count);

            $kp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanhar', '=', '2')->count();
            array_push($kp, $kp_count);

            $cp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanhar', '=', '3')->count();
            array_push($cp, $cp_count);

            $p_count   = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanhar', '=', '4')->count();
            array_push($p, $p_count);

            $sp_count  = DB::table('hasil_kuisioners')
                ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
                ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
                ->where('hasil_kuisioners.id_kuis', '=', $i)
                ->where('hasil_kuisioners.jawabanhar', '=', '5')->count();
            array_push($sp, $sp_count);
        }

        //fuzzyfikasi
        for ($i = 0; $i < 16; $i++) {
            //batas bawah harapan
            $fuzzy11 = (((0 * $tp[$i]) + (1 * $kp[$i]) + (2 * $cp[$i]) + (3 * $p[$i]) + (4 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
            array_push($bbh, $fuzzy11);

            //batas tengah harapan
            $fuzzy22 = (((1 * $tp[$i]) + (2 * $kp[$i]) + (3 * $cp[$i]) + (4 * $p[$i]) + (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
            array_push($bth,  $fuzzy22);

            //batas atas harapan
            $fuzzy33 = (((2 * $tp[$i]) + (3 * $kp[$i]) + (4 * $cp[$i]) + (5 * $p[$i]) + (5 * $sp[$i])) / ($tp[$i] + $kp[$i] + $cp[$i] + $p[$i] + $sp[$i]));
            array_push($bah,  $fuzzy33);

            //batas bawah persepsi
            $fuzzy44 = (((0 * $tpp[$i]) + (1 * $kpp[$i]) + (2 * $cpp[$i]) + (3 * $pp[$i]) + (4 * $spp[$i])) / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bbp,  $fuzzy44);

            //batas tengah persepsi
            $fuzzy55 = (((1 * $tpp[$i]) + (2 * $kpp[$i]) + (3 * $cpp[$i]) + (4 * $pp[$i]) + (5 * $spp[$i])) / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($btp,  $fuzzy55);

            //batas atas persepsi
            $fuzzy66 = (((2 * $tpp[$i]) + (3 * $kpp[$i]) + (4 * $cpp[$i]) + (5 * $pp[$i]) + (5 * $spp[$i])) / ($tpp[$i] + $kpp[$i] + $cpp[$i] + $pp[$i] + $spp[$i]));
            array_push($bap,  $fuzzy66);
        }

        //defuzzyfikasi
        for ($i = 0; $i < 16; $i++) {
            //harapan
            $defuzzyhh = (($bbh[$i] + $bth[$i] + $bah[$i]) / 3);
            array_push($defuzzyh,  $defuzzyhh);

            //persepsi
            $defuzzypp = (($bbp[$i] + $btp[$i] + $bap[$i]) / 3);
            array_push($defuzzyp,  $defuzzypp);
        }

        $hasil = DB::table('hasil_kuisioners')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', 'Sedang Dilaksanakan')
            ->get();
        foreach ($hasil as $key => $item) {
            $before_result = (object)[
                'tp' => $tp[$key],
                'kp' => $kp[$key],
                'cp' => $cp[$key],
                'p' => $p[$key],
                'sp' => $sp[$key],
                'tpp' => $tpp[$key],
                'kpp' => $kpp[$key],
                'cpp' => $cpp[$key],
                'pp' => $pp[$key],
                'spp' => $spp[$key],
            ];
            $after_result = (object)[
                'bbh' => $bbh[$key],
                'bth' => $bth[$key],
                'bah' => $bah[$key],
                'bbp' => $bbp[$key],
                'btp' => $btp[$key],
                'bap' => $bap[$key],
            ];
            $after_result2 = (object)[
                'defuzzyh' => $defuzzyh[$key],
                'defuzzyp' => $defuzzyp[$key],
            ];
            $item->before_result = $before_result;
            $item->after_result = $after_result;
            $item->after_result2 = $after_result2;
        }

        return view('admin/content/hasilkuis/index2', compact(
            'hasil',
            'tp',
            'kp',
            'cp',
            'p',
            'sp',
            'tpp',
            'kpp',
            'cpp',
            'pp',
            'spp',
            'bbh',
            'bth',
            'bah',
            'bbp',
            'btp',
            'bap',
            'defuzzyh',
            'defuzzyp'
        ));
        // dd($fuzzy6);

    }
}
