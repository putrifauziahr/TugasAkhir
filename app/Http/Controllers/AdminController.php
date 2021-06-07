<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin/content/login');
    }

    public function loginProses()
    {
        return view('admin/content/login');
    }

    public function dashboard()
    {
        return view('admin/content/index');
    }
}
