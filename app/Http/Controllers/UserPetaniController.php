<?php
//controller petani untuk halaman dashboard petani
namespace App\Http\Controllers;

use App\model\Kuisioner;
use Illuminate\Http\Request;

class UserPetaniController extends Controller
{

    public function login()
    {
        return view('petani/content/login');
    }

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
