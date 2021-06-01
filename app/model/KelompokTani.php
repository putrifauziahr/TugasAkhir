<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    protected $fillable = ['kelompok_tani'];
    protected $table = "kelompok_tanis";
    protected $primaryKey = "id_poktan";
}
