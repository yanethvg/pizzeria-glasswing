<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;
    protected $table = "order_details";

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class,'details_ingredient','details_id','ingredient_id');
    }
}
