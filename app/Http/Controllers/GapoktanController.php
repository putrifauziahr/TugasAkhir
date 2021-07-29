<?php

namespace App\Http\Controllers;

use App\model\Gapoktan;
use Illuminate\Http\Request;

class GapoktanController extends Controller
{

    public function index()
    {
        $gapoktan = Gapoktan::orderby('gapoktan', 'asc')->get();
        return view('admin/content/gapoktan/index', compact('gapoktan'));
    }

    public function tambahGapoktan(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'gapoktan' => 'required'
        ], $messages);

        $post = new Gapoktan();
        $post->gapoktan = $request->gapoktan;
        $post->save();
        return redirect('admin/showGapoktan')->with('alert', 'Data Gapoktan Berhasil ditambah');
    }

    public function hapusGapoktan(Gapoktan $gapoktan)
    {
        Gapoktan::destroy($gapoktan->id_gapoktan);
        return redirect('admin/showGapoktan')->with('alertF', 'Data Gapoktan Berhasil dihapus');
    }

    public function showDetailGapoktan(Gapoktan $gapoktan)
    {
        return view('admin/content/gapoktan/showDetail', compact('gapoktan'));
    }

    public function postUpdateGapoktan(Request $request, $id_gapoktan)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'gapoktan' => 'required'
        ], $messages);

        $update = [
            'gapoktan' => $request->gapoktan,
        ];

        $update['gapoktan'] = $request->get('gapoktan');
        Gapoktan::where('id_gapoktan', $id_gapoktan)->update($update);
        return redirect('admin/showGapoktan')->with('alert', 'Data Gapoktan  Berhasil diperbarui');
    }
}
