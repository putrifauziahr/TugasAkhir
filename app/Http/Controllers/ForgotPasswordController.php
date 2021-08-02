<?php

namespace App\Http\Controllers;

use App\model\Petani;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('petani/content/forgotPassword/index');
    }

    public function postForgot(Request $request)
    {
        $petani = Petani::where($request->kontak)->first();

        if ($petani != null) {
            return view('petani/content/forgotPassword/forgot', ['kontak' => $request->kontak])->with('alert', 'Berhasil');
        } else {
            return view('petani/content/forgotPassword/index')->with('failed', 'Nomor Telepon Tidak Terdaftar');
        }
    }

    //tampil cari nomor telepon
    public function updateForgot(Request $request)
    {
        $newPassword = $request->newPassword;
        $kontak = $request->kontak;
        $confirmPassword = $request->confirmPassword;
        //    dd($newPassword, $confirmPassword);
        if ($newPassword === $confirmPassword) {
            $change = DB::table('petanis')
                ->where('kontak', $kontak)
                ->update(['password' => Hash::make($newPassword)]);

            return redirect('petani/login')->with('alert', 'Berhasil Mengganti Password');
        } elseif ($newPassword != $confirmPassword) {

            return view('petani/content/forgotPassword/forgot', ['kontak' => $kontak])->with('alertF', 'Password Konfirmasi Tidak Sama');
        }
    }
}
