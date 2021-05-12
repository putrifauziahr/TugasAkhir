<?php

namespace App\Http\Controllers;

use App\model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin/content/kategori/index', compact('kategori'));
    }

    public function tambahKategori(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'kategori' => 'required'
        ], $messages);

        $post = new Kategori();
        $post->kategori = $request->kategori;
        $post->save();
        return redirect('admin/showKategori')->with('alert', 'Data Kategori Berhasil ditambah');
    }

    public function hapusKategori(Kategori $kategori)
    {
        Kategori::destroy($kategori->id_kategori);
        return redirect('admin/showKategori')->with('alert', 'Data Kategori Berhasil dihapus');
    }

    public function showDetailKategori(Kategori $kategori)
    {
        return view('admin/content/kategori/showDetail', compact('kategori'));
    }

    public function postUpdateKategori(Request $request, $id_kategori)
    {
        $request->validate([
            'kategori' => 'required'
        ]);

        $update = [
            'kategori' => $request->kategori,
        ];

        $update['kategori'] = $request->get('kategori');
        Kategori::where('id_kategori', $id_kategori)->update($update);
        return redirect('admin/showKategori')->with('alert', 'Data Kategori Berhasil diperbarui');
    }
}
