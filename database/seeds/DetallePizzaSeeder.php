<?php

use App\DetallePizza;
use Illuminate\Database\Seeder;

class DetallePizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetallePizza::create(
            [
                'ingredient_id' => 9,
                'pizza_id' => 1
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 1,
                'pizza_id' => 2
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 1,
                'pizza_id' => 3
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 6,
                'pizza_id' => 3
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 10,
                'pizza_id' => 3
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 5,
                'pizza_id' => 3
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 1,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 6,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 10,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 5,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 8,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 7,
                'pizza_id' => 5
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 11,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 12,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 11,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' =>6,
                'pizza_id' => 4
            ]
        );
        DetallePizza::create(
            [
                'ingredient_id' => 5,
                'pizza_id' => 6
            ]
        );

    }
}
