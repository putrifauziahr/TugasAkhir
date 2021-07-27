<?php

namespace App\Http\Controllers;

use App\model\Defuzzyfikasi;
use App\model\Fuzzyfikasi;
use Illuminate\Http\Request;

class DefuzzyfikasiController extends Controller
{
    public function prosesDefuzzyfikasi()
    {
        $fuzzy = Fuzzyfikasi::all();
        $defuzzy = new Defuzzyfikasi;
        $defuzzy->harapan = ($fuzzy->batasBawahHarapan + $fuzzy->batasTengahHarapan + $fuzzy->batasAtasHarapan) / 3;
        $defuzzy->persepsi = ($fuzzy->batasBawahPersepsi + $fuzzy->batasTengahPersepsi  + $fuzzy->batasAtasPersepsi) / 3;
        $fuzzy->save();
    }

    public function final()
    {
    }
}
