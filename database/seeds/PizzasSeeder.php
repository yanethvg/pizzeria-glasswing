<?php

use App\Pizza;
use Illuminate\Database\Seeder;

class PizzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create(
            [
                'name_pizza' => 'Pizza personalizada',
                'price' => 4.50
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Pizza de Jamón',
                'price' => 5.50
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Pizza de Pepperoni',
                'price' => 5.50
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Suprema',
                'price' => 7.50
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Hawaina Suprema',
                'price' => 7.50
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Grand Cheese',
                'price' => 6.99
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Vegetariana',
                'price' => 6.99
            ]
        );
    }
}
