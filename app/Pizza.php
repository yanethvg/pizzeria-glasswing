<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;
    protected $fillable=['name_pizza','price','img'];

    public function detallepizzas(){
        return $this->belongsTo(DetallePizza::class);
    }
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class,'pizza_ingredient','pizza_id','ingredient_id');
    }
}
