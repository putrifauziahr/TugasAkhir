<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = ['id_penyuluhan', 'tangibles', 'reliability', 'respon', 'assurance', 'empati'];
    protected $table = "riwayat";
    protected $primaryKey = "id_riwayat";

    //ID_KATEGORI BERELASI DENGAN ID_PENYULUHAN TABEL PENYULUHAN (BERGANTUNG)
    public function Penyuluhans()
    {
        return $this->belongsTo('App\Model\Penyuluhan', 'id_penyuluhan');
    }
}
