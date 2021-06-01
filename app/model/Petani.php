<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    protected $fillable = ['nama', 'email', 'password', 'id_poktan'];
    protected $table = "petanis";
    protected $primaryKey = "id_petani";

    public function KelompokTanis()
    {
        return $this->belongsTo('App\Model\KelompokTani', 'id_poktan');
    }
}
