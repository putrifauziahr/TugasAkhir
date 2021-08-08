<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    protected $fillable = ['kegiatan', 'tempat', 'hari', 'tanggal', 'jam', 'pemateri', 'peserta', 'komoditas', 'deskripsi', 'status', 'image'];
    protected $table = "penyuluhans";
    protected $primaryKey = "id_penyuluhan";

    public function HasilKuisioners()
    {
        return $this->hasMany('App\Model\HasilKuisioner', 'id_penyuluhan');
    }

    public function Riwayats()
    {
        return $this->hasMany('App\Model\Riwayat', 'id_penyuluhan');
    }
}
