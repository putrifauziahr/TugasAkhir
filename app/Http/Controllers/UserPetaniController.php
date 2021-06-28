<?php
//controller petani untuk halaman dashboard petani
namespace App\Http\Controllers;

use App\model\HasilKuisioner;
use App\model\Kuisioner;
use App\model\Penyuluhan;
use App\model\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserPetaniController extends Controller
{

    public function login()
    {
        return view('petani/content/login');
    }

    public function loginProses(Request $request)
    {
        $data = Petani::where('username', $request->username)->first();

        if (!$data) {
            return redirect('/petani/login')->with('alert', 'Username salah');
        } else {
            if (Hash::check($request->password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('id_petani', $data->id_petani);
                Session::put('nama', $data->nama);

                session(['berhasil_login' => true]);
                return redirect('/petani/dashboard');
            }
            return redirect('/petani/login')->with('alert', 'Cek Kembali Email dan Password Anda !');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/petani/login');
    }
    //=============================================================================================//
    public function showProfil($id_petani)
    {
        $petani = Petani::where('id_petani', $id_petani)->first();
        return view('petani.content.profil', compact('petani'));
    }

    public function postUpdateProfil(Request $request, $id_petani)
    {
        if ($request->hasFile('image')) {
            $resorce = $request->file('image');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/profilPetani/", $name);
            DB::table('petanis')->where('id_petani', Session::get('id_petani'))->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'kontak' => $request->kontak,
                    'image' => $name
                ]
            );
            return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Profil Berhasil Di Update');
        } else {
            DB::table('petanis')->where('id_petani', Session::get('id_petani'))->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'kontak' => $request->kontak,
                ]
            );
            return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Profil Berhasil Di Update');
        }
    }

    public function dashboard()
    {
        return view('petani/content/index');
    }
    //====================================================================================================//
    public function showKuisioner()
    {
        $kuiss = Kuisioner::all();
        $penyuluhan = Penyuluhan::where('status', '=', 'Sedang Dilaksanakan')->get();
        return view('petani/content/kuisioner/index', compact('kuiss', 'penyuluhan'));
    }

    public function postTambahKuisioner(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];
        $this->validate($request, [
            'id_penyuluhan' => 'required',
            'id_petani' => 'required',
            'jawaban_har' => 'required',
            'jawaban_per' => 'required'
        ], $messages);

        $post = new HasilKuisioner();
        $post->id_penyuluhan = $request->id_penyuluhan;
        $post->id_petani = $request->id_petani;
        $post->jawaban_har = $request->jawaban_har;
        $post->jawaban_per = $request->jawaban_per;
        $post->save();
        return redirect('petani/showKuisioner')->with('alert', 'Data Kategori Berhasil ditambah');
    }
}
