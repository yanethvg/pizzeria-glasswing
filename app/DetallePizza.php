<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePizza extends Model
{
    public $timestamps = false;
    protected $fillable=['ingredient_id','pizza_id'];
    protected $table = "pizza_ingredient";

    public function pizzas(){
        return $this->hasMany(Pizza::class);
    }
    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }
    public function syncIngredients($telefonos){
        $telefonosInstances=[];
        foreach ($telefonos as $telefono) {
            array_push($telefonosInstances,  new Ingredient(['telefono'=>$telefono]));
        }
        $this->telefonos()->saveMany($telefonosInstances);

    }
}
