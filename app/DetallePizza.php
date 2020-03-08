<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePizza extends Model
{
    public $timestamps = false;
    protected $fillable=['ingredient_id','pizza_id'];
    protected $table = "pizza_ingredient";
}
