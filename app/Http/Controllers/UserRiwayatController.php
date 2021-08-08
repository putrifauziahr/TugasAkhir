<?php

namespace App\Http\Controllers;

use App\model\Kuisioner;
use App\model\Penyuluhan;
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
            ->select('kegiatan', 'tanggal', 'hari')
            ->distinct()
            ->get();
        return view('petani/content/kuisioner/riwayat', compact('riwayat'));
    }


    public function hasil()
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
        $jumlah = Kuisioner::count();
        for ($i = 1; $i <= $jumlah; $i++) {
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
        for ($i = 0; $i < $jumlah; $i++) {
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
        for ($i = 0; $i < $jumlah; $i++) {
            //harapan
            $defuzzyhh = (($bbh[$i] + $bth[$i] + $bah[$i]) / 3);
            array_push($defuzzyh,  $defuzzyhh);

            //persepsi
            $defuzzypp = (($bbp[$i] + $btp[$i] + $bap[$i]) / 3);
            array_push($defuzzyp,  $defuzzypp);
        }

        //tangibles
        $tang = (($defuzzyh[0] + $defuzzyh[1] + $defuzzyh[2]) / 3);
        $tangp =  (($defuzzyp[0] + $defuzzyp[1] + $defuzzyp[2]) / 3);

        //reliability
        $reli = (($defuzzyh[3] + $defuzzyh[4] + $defuzzyh[5] + $defuzzyh[6]) / 4);
        $relip =  (($defuzzyp[3] + $defuzzyp[4] + $defuzzyp[5] + $defuzzyp[6]) / 4);

        //responsiveness
        $respon = (($defuzzyh[7] + $defuzzyh[8]) / 2);
        $responp =  (($defuzzyp[7] + $defuzzyp[8]) / 2);

        //assurance
        $assu = (($defuzzyh[9] + $defuzzyh[10] + $defuzzyh[11]) / 3);
        $assup =  (($defuzzyp[9] + $defuzzyp[10] + $defuzzyp[11]) / 3);

        //emphaty
        $em = (($defuzzyh[12] + $defuzzyh[13] + $defuzzyh[14] + $defuzzyh[15]) / 4);
        $emp =  (($defuzzyp[12] + $defuzzyp[13] + $defuzzyp[14] + $defuzzyp[15]) / 4);

        $hasil = Kuisioner::all();

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

        $penyuluhans = Penyuluhan::where('status', "Sedang Dilaksanakan")->first();
        $penyuluhan = Penyuluhan::all();
        if ($bbh == "0") {
            return redirect('petani/dashboard')->with('alertF', 'Tidak Ada Hasil');
        } else {
            return view('petani/content/kuisioner/hasil', compact(
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
                'defuzzyp',
                'penyuluhan',
                'penyuluhans',
                'tang',
                'tangp',
                'reli',
                'relip',
                'respon',
                'responp',
                'assu',
                'assup',
                'em',
                'emp'
            ));
            // dd($fuzzy6);
        }
    }
}
