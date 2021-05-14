<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPetaniController extends Controller
{
    public function dashboard()
    {
        return view('petani/content/index');
    }
}
