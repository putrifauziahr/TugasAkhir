<?php

namespace App\Http\Controllers;

use App\model\KelompokTani;
use App\model\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelompokTaniController extends Controller
{
    public function index()
    {
        $poktan = KelompokTani::orderby('kelompok_tani', 'asc')->get();
        $total = DB::table('petanis')
            ->join('kelompok_tanis', 'petanis.id_poktan', '=', 'kelompok_tanis.id_poktan')
            ->where('kelompok_tanis.id_poktan', '=', 'petanis.id_poktan')->count();
        return view('admin/content/kelompokTani/index', compact('poktan', 'total'));
    }

    public function tambahKelompokTani(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'kelompok_tani' => 'required'
        ], $messages);

        $post = new KelompokTani();
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
        return view('admin/content/kelompokTani/showDetail', compact('poktan'));
    }

    public function postUpdateKelompokTani(Request $request, $id_poktan)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'kelompok_tani' => 'required'
        ], $messages);

        $update = [
            'kelompok_tani' => $request->kelompok_tani,
        ];

        $update['kelompok_tani'] = $request->get('kelompok_tani');
        KelompokTani::where('id_poktan', $id_poktan)->update($update);
        return redirect('admin/showKelompokTani')->with('alert', 'Data Kelompok Tani Berhasil diperbarui');
    }
}
