<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsIngredient extends Model
{
    public $timestamps = false;
    protected $table = "details_ingredient";

    public function ingredient(){
        return $this->hasOne(Ingredient::class,'id','ingredient_id');
    }
}
