<?php

namespace App\Http\Controllers;

use App\model\Admin;
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
        $petani = Petani::where('username', $request->username)->first();
        if ($petani != null) {
            return view('petani/content/forgotPassword/forgot', ['username' => $request->username])->with('alert-success', 'Berhasil');
        } else {
            return redirect('petani/forgotPassword')->with('alert', 'Username Tidak Terdaftar');
        }
    }

    //tampil cari nomor telepon
    public function updateForgot(Request $request)
    {
        $newPassword = $request->newPassword;
        $username = $request->username;
        $confirmPassword = $request->confirmPassword;
        //    dd($newPassword, $confirmPassword);
        if ($newPassword === $confirmPassword) {
            DB::table('petanis')
                ->where('username', $username)
                ->update(['password' => Hash::make($newPassword)]);

            return redirect('petani/login')->with('alert-success', 'Berhasil Mengganti Password');
        } elseif ($newPassword != $confirmPassword) {
            return view('petani/content/forgotPassword/forgot', ['username' => $username])->with('alert', 'Password Konfirmasi Tidak Sama');
        }
    }

    //ADMIN
    public function indexAdmin()
    {
        return view('admin/content/forgotPassword/index');
    }

    public function postForgotAdmin(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();
        if ($admin != null) {
            return view('admin/content/forgotPassword/forgot', ['username' => $request->username])->with('alert-success', 'Berhasil');
        } else {
            return redirect('admin/forgotPassword')->with('alert', 'Username Tidak Terdaftar');
        }
    }

    //tampil cari nomor telepon
    public function updateForgotAdmin(Request $request)
    {
        $newPassword = $request->newPassword;
        $username = $request->username;
        $confirmPassword = $request->confirmPassword;
        //    dd($newPassword, $confirmPassword);
        if ($newPassword === $confirmPassword) {
            DB::table('admins')
                ->where('username', $username)
                ->update(['password' => Hash::make($newPassword)]);

            return redirect('admin/login')->with('alert-success', 'Berhasil Mengganti Password');
        } elseif ($newPassword != $confirmPassword) {
            return view('admin/content/forgotPassword/forgot', ['username' => $username])->with('alert', 'Password Konfirmasi Tidak Sama');
        }
    }
}
