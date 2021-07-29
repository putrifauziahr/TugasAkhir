<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    protected $fillable = ['pertanyaan', 'id_kategori'];
    protected $table = "kuisioners";
    protected $primaryKey = "id_kuis";

    //ID_KATEGORI BERELASI DENGAN ID_KATEGORI TABEL KATEGORI (BERGANTUNG)
    public function Kategoris()
    {
        return $this->belongsTo('App\Model\Kategori', 'id_kategori');
    }

    public function HasilKuisioners()
    {
        return $this->hasMany('App\Model\HasilKuisioner', 'id_kuis');
    }
}
