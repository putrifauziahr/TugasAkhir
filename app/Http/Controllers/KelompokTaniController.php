<?php

namespace App\Http\Controllers;

use App\model\Gapoktan;
use App\model\KelompokTani;
use App\model\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelompokTaniController extends Controller
{
    public function index()
    {
        $gapoktan = Gapoktan::all();
        $poktan = KelompokTani::orderby('kelompok_tani', 'asc')->get();
        $poktann = KelompokTani::with('Petanis')->count();
        // $total = DB::table('petanis')
        //     ->join('kelompok_tanis', 'petanis.id_poktan', '=', 'kelompok_tanis.id_poktan')
        //     ->where('kelompok_tanis.id_poktan', '=', 'petanis.id_poktan')->count();
        return view('admin/content/kelompokTani/index', compact('poktan', 'poktann', 'gapoktan'));
    }

    public function tambahKelompokTani(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'id_gapoktan' => 'required',
            'kelompok_tani' => 'required'
        ], $messages);

        $post = new KelompokTani();
        $post->id_gapoktan = $request->id_gapoktan;
        $post->kelompok_tani = $request->kelompok_tani;
        $post->save();
        return redirect('admin/showKelompokTani')->with('alert', 'Data Kelompok Tani Berhasil ditambah');
    }

    public function hapusKelompokTani(KelompokTani $poktan)
    {
        KelompokTani::destroy($poktan->id_poktan);
        return redirect('admin/showKelompokTani')->with('alertF', 'Data Kelompok Tani Berhasil dihapus');
    }

    public function showDetailKelompokTani(KelompokTani $poktan)
    {
        $gapoktan = Gapoktan::all();
        return view('admin/content/kelompokTani/showDetail', compact('poktan', 'gapoktan'));
    }

    public function postUpdateKelompokTani(Request $request, $id_poktan)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'id_gapoktan' => 'required',
            'kelompok_tani' => 'required'
        ], $messages);

        $update = [
            'id_gapoktan' => $request->id_gapoktan,
            'kelompok_tani' => $request->kelompok_tani,
        ];

        $update['id_gapoktan'] = $request->get('id_gapoktan');
        $update['kelompok_tani'] = $request->get('kelompok_tani');
        KelompokTani::where('id_poktan', $id_poktan)->update($update);
        return redirect('admin/showKelompokTani')->with('alert', 'Data Kelompok Tani Berhasil diperbarui');
    }
}
