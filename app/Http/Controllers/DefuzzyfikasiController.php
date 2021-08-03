<?php

namespace App\Http\Controllers;

use App\model\Defuzzyfikasi;
use App\model\Fuzzyfikasi;
use App\model\Penyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefuzzyfikasiController extends Controller
{
    public function showDefuzzy()
    {
        // $defuzzy = Defuzzyfikasi::all();
        $defuzzy = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->get();

        //tangibles
        $tang = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.harapan');

        $tangp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.persepsi');

        //reliability
        $reli = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.harapan');

        $relip = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.persepsi');

        //Responsivenes
        $respon = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.harapan');

        $responp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.persepsi');

        //Assurance
        $assu = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.harapan');

        $assup = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.persepsi');

        //Empathy
        $em = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.harapan');

        $emp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.persepsi');


        return view('admin/content/prosesdata/defuzzy', compact(
            'defuzzy',
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

        //input defuzzyfikasi
        for ($i = 0; $i < 16; $i++) {
            $check = Defuzzyfikasi::where('id_fuzzy', $request->id_fuzzy)->first();
            if (!$check) {
                $answers[] = [
                    'id_fuzzy' => $request->id_fuzzy[$i],
                    'harapan' => $request->harapan[$i],
                    'persepsi' => $request->persepsi[$i],
                ];
            } else {
                return redirect('admin/showDefuzzy')->with('alertF', 'Tidak Dapat Melakukan Defuzzyfikasi Berulang');
            }
        }
        Defuzzyfikasi::insert($answers);
        return redirect('admin/showDefuzzy')->with('alert', 'Proses Defuzzyfikasi Berhasil');
    }

    public function final()
    {
        $penyuluhan = Penyuluhan::where('status', "Sedang Dilaksanakan")->first();
        $tang = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.harapan');

        $tangp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.persepsi');

        //reliability
        $reli = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.harapan');

        $relip = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.persepsi');

        //Responsivenes
        $respon = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.harapan');

        $responp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.persepsi');

        //Assurance
        $assu = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.harapan');

        $assup = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.persepsi');

        //Empathy
        $em = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.harapan');

        $emp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.status', '=', "Sedang Dilaksanakan")
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.persepsi');

        return view('admin/content/hasil/hasil', compact(
            'tang',
            'tangp',
            'reli',
            'relip',
            'respon',
            'responp',
            'assu',
            'assup',
            'em',
            'emp',
            'penyuluhan'
        ));
    }

    public function riwayatHasil()
    {
        $penyuluhan = Penyuluhan::all();
        return view('admin/content/hasil/riwayat', compact(
            'penyuluhan'
        ));
    }

    public function detailRiwayat($id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::where('id_penyuluhan', $id_penyuluhan)->first();

        $tang = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.harapan');

        $tangp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Tangibles")
            ->average('defuzzyfikasi.persepsi');

        //reliability
        $reli = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.harapan');

        $relip = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Reliability")
            ->average('defuzzyfikasi.persepsi');

        //Responsivenes
        $respon = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.harapan');

        $responp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Responsiveness")
            ->average('defuzzyfikasi.persepsi');

        //Assurance
        $assu = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.harapan');

        $assup = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Assurance")
            ->average('defuzzyfikasi.persepsi');

        //Empathy
        $em = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.harapan');

        $emp = DB::table('defuzzyfikasi')
            ->join('fuzzyfikasi', 'defuzzyfikasi.id_fuzzy', '=', 'fuzzyfikasi.id_fuzzy')
            ->join('hasil_kuisioners', 'fuzzyfikasi.id_hasil', '=', 'hasil_kuisioners.id_hasil')
            ->join('kuisioners', 'hasil_kuisioners.id_kuis', '=', 'kuisioners.id_kuis')
            ->join('penyuluhans', 'hasil_kuisioners.id_penyuluhan', '=', 'penyuluhans.id_penyuluhan')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->where('penyuluhans.id_penyuluhan', $id_penyuluhan)
            ->where('kategoris.kategori', '=', "Empathy")
            ->average('defuzzyfikasi.persepsi');

        return view('admin/content/hasil/detailRiwayat', compact(
            'tang',
            'tangp',
            'reli',
            'relip',
            'respon',
            'responp',
            'assu',
            'assup',
            'em',
            'emp',
            'penyuluhan'
        ));
    }
}
