<?php
//controller petani pada halaman admin
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Petani;
use App\model\KelompokTani;

class PetaniController extends Controller
{
    public function index()
    {
        $poktan = KelompokTani::all();
        return view('admin/content/petani/index', compact('poktan'));
    }
}
