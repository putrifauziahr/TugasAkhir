<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nama', 'username', 'password'];
    protected $table = "admins";
    protected $primaryKey = "id_admin";
}
