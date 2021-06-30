<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HasilKuisioner extends Model
{
    protected $fillable = [
        'id_petani', 'id_penyuluhan', 'id_kuis'
    ];
    protected $table = "hasil_kuisioners";
    protected $primaryKey = "id_hasil";

    public function Penyuluhans()
    {
        return $this->belongsTo('App\Model\Penyuluhan', 'id_penyuluhan');
    }

    public function Petanis()
    {
        return $this->belongsTo('App\Model\Petani', 'id_petani');
    }

    public function Kuisioners()
    {
        return $this->belongsTo('App\Model\Kuisioner', 'id_kuis');
    }
}
