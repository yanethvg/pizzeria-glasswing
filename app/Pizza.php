<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;
    protected $fillable=['name_pizza','price'];
}
