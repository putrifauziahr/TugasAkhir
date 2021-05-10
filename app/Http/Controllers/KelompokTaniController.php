<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelompokTaniController extends Controller
{
    public function index()
    {
        return view('admin/content/kelompokTani/index');
    }
}
