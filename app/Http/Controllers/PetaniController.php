<?php
//controller petani pada halaman admin
namespace App\Http\Controllers;

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
        $petani = DB::table('petanis')
            ->join('kelompok_tanis', 'petanis.id_poktan', '=', 'petanis.id_poktan')
            ->orderBy('petanis.id_poktan', 'asc')
            ->get();
        return view('admin/content/petani/index', compact('poktan', 'petani'));
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
            'email' => 'required',
            'password' => 'required',
            'id_poktan' => 'required',
        ], $messages);

        $post = new Petani();
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->id_poktan = $request->id_poktan;
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
        $poktan = KelompokTani::all();
        return view('admin/content/petani/viewDetail', compact('petani', 'poktan'));
    }

    public function showDetailPetani(Petani $petani)
    {
        $poktan = KelompokTani::all();
        return view('admin/content/petani/showDetail', compact('petani', 'poktan'));
    }

    public function postUpdatePetani(Request $request, $id_petani)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_poktan' => 'required',
        ]);

        $update = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'id_poktan' => $request->id_poktan,
        ];

        $update['nama'] = $request->get('nama');
        $update['email'] = $request->get('email');
        $update['password'] = $request->get('password');
        $update['id_poktan'] = $request->get('id_poktan');
        Petani::where('id_petani', $id_petani)->update($update);
        return redirect('admin/showPetani')->with('alert', 'Data Petani Berhasil diperbarui');
    }
}
