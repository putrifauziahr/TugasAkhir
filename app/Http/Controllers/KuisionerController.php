<?php

namespace App\Http\Controllers;

use App\model\Kategori;
use App\model\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuisionerController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $kuis = DB::table('kuisioners')
            ->join('kategoris', 'kuisioners.id_kategori', '=', 'kategoris.id_kategori')
            ->orderBy('kuisioners.id_kategori', 'asc')
            ->get();
        return view('admin/content/kuisioner/index', compact('kategori', 'kuis'));
    }

    public function tambahKuisioner(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'pertanyaan' => 'required',
            'id_kategori' => 'required',
        ], $messages);

        $post = new Kuisioner();
        $post->pertanyaan = $request->pertanyaan;
        $post->id_kategori = $request->id_kategori;
        $post->save();
        return redirect('admin/showKuisioner')->with('alert', 'Data Kuisioner Berhasil ditambah');
    }

    public function hapusKuisioner(Kuisioner $kuis)
    {
        Kuisioner::destroy($kuis->id_kuis);
        return redirect('admin/showKuisioner')->with('alertF', 'Data Kuisioner Berhasil dihapus');
    }

    public function viewDetailKuisioner(Kuisioner $kuis)
    {
        $idkategori = $kuis->id_kategori;
        $kategori = Kategori::where('id_kategori', $idkategori)->get();
        return view('admin/content/kuisioner/viewDetail', compact('kuis', 'kategori'));
    }

    public function showDetailKuisioner(Kuisioner $kuis)
    {
        $kategori = Kategori::all();
        return view('admin/content/kuisioner/showDetail', compact('kuis', 'kategori'));
    }

    public function postUpdateKuisioner(Request $request, $id_kuis)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'pertanyaan' => 'required',
            'id_kategori' => 'required',
        ], $messages);

        $update = [
            'pertanyaan' => $request->pertanyaan,
            'id_kategori' => $request->id_kategori,
        ];

        $update['pertanyaan'] = $request->get('pertanyaan');
        $update['id_kategori'] = $request->get('id_kategori');
        Kuisioner::where('id_kuis', $id_kuis)->update($update);
        return redirect('admin/showKuisioner')->with('alert', 'Data Kuisioner Berhasil diperbarui');
    }
}
