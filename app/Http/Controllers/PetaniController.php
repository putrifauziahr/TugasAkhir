<?php
//controller petani pada halaman admin
namespace App\Http\Controllers;

use App\model\Desa;
use Illuminate\Http\Request;
use App\model\Petani;
use App\model\KelompokTani;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PetaniController extends Controller
{
    public function index()
    {
        $poktan = KelompokTani::all();
        $desa = Desa::all();
        $petani = DB::table('petanis')
            ->join('kelompok_tanis', 'kelompok_tanis.id_poktan', '=', 'petanis.id_poktan')
            ->orderBy('petanis.id_poktan', 'asc')
            ->get();
        return view('admin/content/petani/index', compact('poktan', 'petani', 'desa'));
    }

    public function tambahPetani(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'komoditas' => 'required',
            'id_poktan' => 'required',
            'kode_desa' => 'required',
        ], $messages);

        $post = new Petani();
        $post->nama = $request->nama;
        $post->username = $request->username;
        $post->password = Hash::make($request->password);
        $post->komoditas = $request->komoditas;
        $post->id_poktan = $request->id_poktan;
        $post->kode_desa = $request->kode_desa;
        $post->save();
        return redirect('admin/showPetani')->with('alert', 'Data Petani Berhasil ditambah');
    }


    public function hapusPetani(Petani $petani)
    {
        Petani::destroy($petani->id_petani);
        return redirect('admin/showPetani')->with('alertF', 'Data Petani Berhasil dihapus');
    }

    public function viewDetailPetani(Petani $petani)
    {
        $idpoktan = $petani->id_poktan;
        $kodes = $petani->kode_desa;
        $poktan = KelompokTani::where('id_poktan', $idpoktan)->get();
        $desa = Desa::where('kode_desa', $kodes)->get();
        return view('admin/content/petani/viewDetail', compact('petani', 'poktan', 'desa'));
    }

    public function showDetailPetani(Petani $petani)
    {
        $poktan = KelompokTani::all();
        $desa = Desa::all();
        return view('admin/content/petani/showDetail', compact('petani', 'poktan', 'desa'));
    }

    public function postUpdatePetani(Request $request, $id_petani)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_poktan' => 'required',
        ], $messages);

        $update = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'komoditas' => $request->komoditas,
            'id_poktan' => $request->id_poktan,
            'kode_desa' => $request->kode_desa,
        ];

        $update['nama'] = $request->get('nama');
        $update['username'] = $request->get('username');
        $update['password'] = Hash::make($request->password);
        $update['komoditas'] = $request->get('komoditas');
        $update['id_poktan'] = $request->get('id_poktan');
        $update['kode_desa'] = $request->get('kode_desa');
        Petani::where('id_petani', $id_petani)->update($update);
        return redirect('admin/showPetani')->with('alert', 'Data Petani Berhasil diperbarui');
    }
}
