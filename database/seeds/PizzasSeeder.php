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
                'price' => 4.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886118/Salsa-de-tomate-para-pizza-1_qwqai8.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Pizza de Jamón',
                'price' => 5.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886164/descarga_2_xaze7m.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Pizza de Pepperoni',
                'price' => 5.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886208/Pizza-de-pepperoni_atgbvt.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Suprema',
                'price' => 7.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886257/descarga_3_qiajn9.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Hawaina Suprema',
                'price' => 7.50,
                'img' =>  'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886345/descarga_4_nyp9wb.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Grand Cheese',
                'price' => 6.99,
                'img' =>  'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886345/descarga_4_nyp9wb.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Vegetariana',
                'price' => 6.99,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886464/Whole-Wheat-Veggie-Pizza_EXPS_HCKA19_12558_C10_13_5b_brg98w.jpg'
            ]
        );
        Pizza::create(
            [
                'name_pizza' => 'Parmesana',
                'price' => 7.00,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886526/54759_w9vdpa.jpg'
            ]
        );
    }
}
