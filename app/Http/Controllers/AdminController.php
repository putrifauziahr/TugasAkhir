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
                Session::put('id_admin', $data->id);
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
        return redirect('/admin/login')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
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
