<?php
//controller petani untuk halaman dashboard petani
namespace App\Http\Controllers;

use App\model\Desa;
use App\model\HasilKuisioner;
use App\model\KelompokTani;
use App\model\Kuisioner;
use App\model\Penyuluhan;
use App\model\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

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
                Session::put('image', $data->image);

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
        $poktann = $petani->id_poktan;
        $desaa = $petani->kode_desa;
        $desa = Desa::where('kode_desa', '=', $desaa)->get();
        $poktan = KelompokTani::where('id_poktan', '=', $poktann)->get();
        return view('petani.content.profil', compact('petani', 'poktan', 'desa'));
    }

    public function postUpdateProfil(Request $request, $id_petani)
    {
        DB::table('petanis')->where('id_petani', Session::get('id_petani'))->update(
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
            ]
        );
        return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Profil Berhasil Di Update');
    }

    public function updateFotoProfil(Request $request, $id_petani)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'image' => 'required',
        ], $messages);

        if ($imagee = $request->file('image')) {
            $destinationPath = 'profilPetani'; // upload path
            $nama_image = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $nama_image);
            $update['image'] = "$nama_image";
        }
        Petani::where(['id_petani' => $id_petani])->update($update);
        return redirect()->route('petani/showProfil', $id_petani)->with('alert-success', 'Foto Profil Berhasil diperbarui');
    }

    public function updatePassword(Request $request, $id_petani)
    {
        $newpassword = $request->newpassword;
        if ($newpassword === $request->password_confirmation) {
            DB::table('petanis')->where('id_petani', $id_petani)->update([
                'password' => Hash::make($request->newpassword),
            ]);
            return redirect()->back()->with("alert-success", "Berhasil Ganti Password");
        } else {
            return redirect()->back()->with("alert", "Gagal Ganti Password");
        }
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
        $kuisss = Kuisioner::all();
        $penyuluhan = Penyuluhan::where('status', '=', 'Sedang Dilaksanakan')->get();
        return view('petani/content/kuisioner/index', compact('kuiss', 'penyuluhan', 'kuisss'));
    }

    public function postTambahKuisioner(Request $request)
    {
        $this->validate($request, [
            'id_petani' => 'required',
            'id_penyuluhan' => 'required',
            'id_kuis' => 'required',
            'jawabanper' => 'required',
            'jawabanhar' => 'required',
        ]);

        $kuiss =  Kuisioner::all();
        $jumlah_dipilih = count($kuiss);
        $current_date_time = date('Y-m-d H:i:s');

        for ($i = 1; $i <= $jumlah_dipilih; $i++) {
            $check = HasilKuisioner::where('id_petani', $request->id_petani)->where('id_penyuluhan', $request->id_penyuluhan)->first();
            if (!$check) {
                $answers[] = [
                    'id_petani' => $request->id_petani,
                    'id_penyuluhan' => $request->id_penyuluhan,
                    'id_kuis' => $request->id_kuis[$i],
                    'jawabanper' => $request->jawabanper[$i],
                    'jawabanhar' => $request->jawabanhar[$i],
                    'created_at' => $current_date_time,
                    'updated_at' => $current_date_time,
                ];
            } else {
                return redirect('petani/showKuisioner')->with('alertF', 'Tidak Dapat Mengisi Kuisioner Berulang !');
            }
        }
        HasilKuisioner::insert($answers);
        return redirect('petani/showKuisioner')->with('alert', 'Kuisioner Berhasil diisi');
    }
}
