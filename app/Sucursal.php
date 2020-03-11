<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public $timestamps = false;
    protected $fillable=['name','address'];
    protected $table = "sucursales";
}
