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

    public function dashboard()
    {
        if (session('berhasil_login')) {
            $pen = Penyuluhan::where('status', '=', 'Belum Dilaksanakan')->count();
            $penyu = Penyuluhan::where('status', '=', 'Sedang Dilaksanakan')->count();
            $penyul = Penyuluhan::where('status', '=', 'Sudah Dilaksanakan')->count();
            return view('petani.content.index', compact('pen', 'penyu', 'penyul'));
        } else {
            return redirect('/petani/login');
        }
    }


    //============================LOGIN=========================================//
    public function login()
    {
        if (session('berhasil_login')) {
            $pen = Penyuluhan::where('status', '=', 'Belum Dilaksanakan')->count();
            $penyu = Penyuluhan::where('status', '=', 'Sedang Dilaksanakan')->count();
            $penyul = Penyuluhan::where('status', '=', 'Sudah Dilaksanakan')->count();
            return view('petani.content.index', compact('pen', 'penyu', 'penyul'));
        } else {
            return view('petani/content/login');
        }
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


    //=======================PROFIL======================================================================//
    public function showProfil($id_petani)
    {
        $petani = Petani::where('id_petani', $id_petani)->first();
        return view('petani.content.profil', compact('petani'));
    }

    public function postUpdateProfil(Request $request, $id_petani)
    {
        DB::table('petanis')->where('id_petani', Session::get('id_petani'))->update(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
            ]
        );
        return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Profil Berhasil Di Update');
    }

    public function updateFotoProfil(Request $request, $id_petani)
    {

        if ($imagee = $request->file('image')) {
            $destinationPath = 'profilPetani'; // upload path
            $nama_image = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $nama_image);
            $update['image'] = "$nama_image";
        }
        Petani::where(['id_petani' => $id_petani])->update($update);
        return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Foto Profil Berhasil diperbarui');
    }


    //================================PENYULUHAN===================================================================//
    public function showDetailPenyuluhan(Penyuluhan $penyuluhan)
    {
        return view('petani/content/detailPenyuluhan', compact('penyuluhan'));
    }

    public function showPenyuluhan()
    {
        $penyuluhan = Penyuluhan::all();
        return view('petani/content/showPenyuluhan', compact('penyuluhan'));
    }


    //===============================KUISIONER=====================================================================//
    public function showKuisioner()
    {
        $kuiss = Kuisioner::all();
        $opsi = DB::table('opsi')->get();
        $penyuluhan = Penyuluhan::where('status', '=', 'Sedang Dilaksanakan')->get();
        return view('petani/content/kuisioner/index', compact('kuiss', 'penyuluhan', 'opsi'));
    }

    public function postTambahKuisioner(Request $request)
    {

        for ($i = 1; $i < count($request->jawabanper); $i++) {
            $answers[] = [
                'id_petani' => $request->id_petani,
                'id_penyuluhan' => $request->id_penyuluhan,
                'id_kuis' => $request->id_kuis,
                'jawabanhar' => $request->jawabanhar[$i],
                'jawabanper' => $request->jawabanper[$i],
            ];
        }
        HasilKuisioner::insert($answers);

        // $messages = [
        //     'required' => ':attribute wajib diisi !!!',
        //     'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
        //     'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        // ];
        // $this->validate($request, [
        //     'id_petani' => 'required',
        //     'id_penyuluhan' => 'required',
        //     'id_kuis' => 'required',
        //     'jawabanper' => 'required',
        //     'jawabanhar' => 'required',
        // ], $messages);

        // $post = new HasilKuisioner();
        // $post->id_petani = $request->id_petani;
        // $post->id_penyuluhan = $request->id_penyuluhan;
        // $post->id_kuis = $request->id_kuis;
        // $post->jawabanper = $request->jawabanper;
        // $post->jawabanhar = $request->jawabanhar;
        // $post->save();
        return redirect('petani/showKuisioner')->with('alert', 'Data Kategori Berhasil ditambah');
    }
}
