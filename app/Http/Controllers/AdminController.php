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
        return view('admin/content/login');
    }

    public function loginProses(Request $request)
    {
        $data = Admin::where('email', $request->email)->first();

        if (!$data) {
            return redirect('/admin/login')->with('message', 'email salah');
        } else {
            if (Hash::check($request->password, $data->password)) {
                Session::put('email', $data->email);
                Session::put('id_admin', $data->id_admin);
                Session::put('nama', $data->nama);

                session(['berhasil_login' => true]);
                return redirect('/admin/dashboard');
            }
            return redirect('/admin/login')->with('alert', 'Password atau Email Salah !');
        }
    }

    //====================================================================================//

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
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        //Redirect dengan status 
        return redirect('/admin/login')->with('alert-success', 'Selamat Anda Berhasil Login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    //===================================================================================//
    public function showProfil($id_admin)
    {
        $admin = Admin::where('id_admin', $id_admin)->first();
        return view('admin.content.profil', compact('admin'));
    }

    public function postUpdateProfil(Request $request, $id_admin)
    {
        if ($request->hasFile('image')) {
            $resorce = $request->file('image');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/profilAdmin/", $name);
            DB::table('admins')->where('id_admin', Session::get('id_admin'))->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'image' => $name
                ]
            );
            return redirect()->route('admin/showProfil', $id_admin)->with('alert-success', 'Profil Berhasil Di Update');
        } else {
            DB::table('admins')->where('id_admin', Session::get('id_admin'))->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp
                ]
            );
            return redirect()->route('admin/showProfil', $id_admin)->with('alert-success', 'Profil Berhasil Di Update');
        }
    }
    //===================================================================================//
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
