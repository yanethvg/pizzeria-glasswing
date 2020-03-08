<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;
    protected $fillable=['name_ingredient','price'];

    public function detallepizzas(){
        return $this->belongsTo(DetallePizza::class);
    }
    public function pizzas(){
        return $this->belongsToMany(Pizza::class,'pizza_ingredient','ingredient_id','pizza_id');
    }
}
