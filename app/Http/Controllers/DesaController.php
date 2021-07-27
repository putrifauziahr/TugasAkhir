<?php

namespace App\Http\Controllers;

use App\model\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{

    public function index()
    {
        $desa = Desa::paginate(5);
        return view('admin/content/desa/index', compact('desa'));
    }

    public function tambahDesa(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'kode_desa' => 'required',
            'desa' => 'required',
        ], $messages);

        $post = new Desa();
        $post->kode_desa = $request->kode_desa;
        $post->desa = $request->desa;
        $post->save();
        return redirect('admin/showDesa')->with('alert', 'Data Desa Berhasil ditambah');
    }

    public function hapusDesa(Desa $desa)
    {
        Desa::destroy($desa->kode_desa);
        return redirect('admin/showDesa')->with('alertF', 'Data Desa Berhasil dihapus');
    }

    public function showDetailDesa(Desa $desa)
    {
        return view('admin/content/desa/showDetail', compact('desa'));
    }

    public function postUpdateDesa(Request $request, $kode_desa)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'kode_desa' => 'required',
            'desa' => 'required|min:5',
        ], $messages);

        $update = [
            'kode_desa' => $request->kode_desa,
            'desa' => $request->desa,
        ];

        $update['kode_desa'] = $request->get('kode_desa');
        $update['desa'] = $request->get('desa');
        Desa::where('kode_desa', $kode_desa)->update($update);
        return redirect('admin/showDesa')->with('alert', 'Data Desa Berhasil diperbarui');
    }
}
