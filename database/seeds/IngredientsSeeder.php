<?php

use App\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(
            [
                'name_ingredient' => 'Pepperoni',
                'price' => 1.50
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Pollo',
                'price' => 2.50
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Salchichas',
                'price' => 0.50
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Bacon',
                'price' => 2.50
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Champiñones',
                'price' => 2.00
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Pimientos',
                'price' => 2.10
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Queso',
                'price' => 2.50
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Piña',
                'price' => 1.20
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Jamón',
                'price' => 1.10
            ]
            );
    }
}
