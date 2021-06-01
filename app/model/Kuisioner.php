<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    protected $fillable = ['pertanyaan', 'id_kategori'];
    protected $table = "kuisioners";
    protected $primaryKey = "id_kuis";

    public function Kategoris()
    {
        return $this->belongsTo('App\Model\Kategori', 'id_kategori');
    }
}
