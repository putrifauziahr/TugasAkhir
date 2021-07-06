<?php

namespace App\Http\Controllers;

use App\model\Admin;
use App\model\Kategori;
use App\model\KelompokTani;
use App\model\Kuisioner;
use App\model\Penyuluhan;
use App\model\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login()
    {
        if (session('berhasil_login')) {
            $petani = Petani::count();
            $kategori = Kategori::count();
            $kuis = Kuisioner::count();
            $poktan = KelompokTani::count();
            $penyuluhan = Penyuluhan::count();
            return view('admin.content.index', compact('kuis', 'kategori', 'poktan', 'petani', 'penyuluhan'));
        } else {
            return view('admin/content/login');
        }
    }

    public function loginProses(Request $request)
    {
        $data = Admin::where('username', $request->username)->first();

        if (!$data) {
            return redirect('/admin/login')->with('alert', 'Username salah');
        } else {
            if (Hash::check($request->password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('id_admin', $data->id_admin);
                Session::put('nama', $data->nama);

                session(['berhasil_login' => true]);
                return redirect('/admin/dashboard');
            }
            return redirect('/admin/login')->with('alert', 'Username atau Password Salah !');
        }
    }

    //====================REGISTER================================================================//

    public function register()
    {
        return view('admin/content/register');
    }

    public function registerProses(Request $request)
    {
        $timestamps = true;
        //query builder insert
        DB::table('admins')->insert(
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]
        );
        //Redirect dengan status 
        return redirect('/admin/login')->with('alert-success', 'Selamat Anda Berhasil Mendaftar');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    //==========================PROFIL=========================================================//
    public function showProfil($id_admin)
    {
        $admin = Admin::where('id_admin', $id_admin)->first();
        return view('admin.content.profil', compact('admin'));
    }

    public function postUpdateProfil(Request $request, $id_admin)
    {
        DB::table('admins')->where('id_admin', Session::get('id_admin'))->update(
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
            ]
        );
        return redirect()->route('admin/showProfil', $id_admin)->with('alert-success', 'Profil Berhasil Di Update');
    }

    public function updateFotoProfil(Request $request, $id_admin)
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
            $destinationPath = 'profilAdmin'; // upload path
            $nama_image = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $nama_image);
            $update['image'] = "$nama_image";
        }
        Admin::where(['id_admin' => $id_admin])->update($update);
        return redirect()->route('admin/showProfil', $id_admin)->with('alert-success', 'Foto Profil Berhasil diperbarui');
    }
    //==========================DASHBOARD=========================================================//
    public function dashboard()
    {
        $petani = Petani::count();
        $kategori = Kategori::count();
        $kuis = Kuisioner::count();
        $poktan = KelompokTani::count();
        $penyuluhan = Penyuluhan::count();
        return view('admin/content/index', compact('kuis', 'kategori', 'poktan', 'petani', 'penyuluhan'));
    }
}
