<?php
//controller petani untuk halaman dashboard petani
namespace App\Http\Controllers;

use App\model\Kuisioner;
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
        $data = Petani::where('email', $request->email)->first();

        if (!$data) {
            return redirect('/petani/login')->with('message', 'email salah');
        } else {
            if (Hash::check($request->password, $data->password)) {
                Session::put('email', $data->email);
                Session::put('id_petani', $data->id);
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

    public function dashboard()
    {
        return view('petani/content/index');
    }

    public function showKuisioner()
    {
        $kuiss = Kuisioner::all();
        return view('petani/content/kuisioner/index', compact('kuiss'));
    }
}
