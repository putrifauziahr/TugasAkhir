<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    protected $fillable = ['nama', 'username', 'password', 'id_poktan'];
    protected $table = "petanis";
    protected $primaryKey = "id_petani";


    //Relasi sebagai sandaran, bergantung
    public function KelompokTanis()
    {
        return $this->belongsTo('App\Model\KelompokTani', 'id_poktan');
    }

    //Ada tabel lain yang berelasi dengan id petani
    public function HasilKuisioners()
    {
        return $this->hasMany('App\Model\HasilKuisioner', 'id_petani');
    }
}
