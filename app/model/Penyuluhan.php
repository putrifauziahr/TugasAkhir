<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    protected $fillable = ['kegiatan', 'tempat', 'hari', 'tanggal', 'jam', 'pemateri', 'peserta', 'deskripsi', 'image'];
    protected $table = "penyuluhans";
    protected $primaryKey = "id_penyuluhan";
}
