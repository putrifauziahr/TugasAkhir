<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    public function index()
    {
        return view('admin/content/penyuluhan/index');
    }
}
