<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    protected $fillable = ['id_gapoktan', 'kelompok_tani'];
    protected $table = "kelompok_tanis";
    protected $primaryKey = "id_poktan";

    public function Petanis()
    {
        return $this->hasMany('App\Model\Petani', 'id_poktan');
    }

    public function gapoktanRef()
    {
        return $this->belongsTo('App\Model\Gapoktan', 'id_gapoktan');
    }
}
