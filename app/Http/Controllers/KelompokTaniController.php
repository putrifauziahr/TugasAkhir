<?php

namespace App\Http\Controllers;

use App\model\KelompokTani;
use Illuminate\Http\Request;

class KelompokTaniController extends Controller
{
    public function index()
    {
        $poktan = KelompokTani::all();
        return view('admin/content/kelompokTani/index', compact('poktan'));
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
        $request->validate([
            'kelompok_tani' => 'required'
        ]);

        $update = [
            'kelompok_tani' => $request->kelompok_tani,
        ];

        $update['kelompok_tani'] = $request->get('kelompok_tani');
        KelompokTani::where('id_poktan', $id_poktan)->update($update);
        return redirect('admin/showKelompokTani')->with('alert', 'Data Kelompok Tani Berhasil diperbarui');
    }
}
