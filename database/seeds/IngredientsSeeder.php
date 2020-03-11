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
                'price' => 1.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885169/176_iqa9ry.png'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Pollo',
                'price' => 2.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885248/descarga_wnpdsx.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Salchichas',
                'price' => 0.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885313/que-contienen-las-salchichas-tipo-coctel_ix6iye.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Bacon',
                'price' => 2.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885549/bacon_b8u3wl.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Champiñones',
                'price' => 2.00,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885604/champi%C3%B1ones-asados_gclwqv.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Pimientos',
                'price' => 2.10,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885677/beneficios-de-comer-pimientos-de-diferentes-colores_lmu2q2.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Extra Queso',
                'price' => 2.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885771/beneficios-de-comer-queso-en-ninos-_1_ydefqh.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Piña',
                'price' => 1.20,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885853/pina_hlonvk.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Jamón',
                'price' => 1.10,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885900/jamon_yb0dkj.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Carne de Res',
                'price' => 1.10,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583885947/carne-de-res-colombiana_keq8qq.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Cebolla Morada',
                'price' => 0.50,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886005/1146486_yfcmus.jpg'
            ]
            );
        Ingredient::create(
            [
                'name_ingredient' => 'Tomate',
                'price' => 1.20,
                'img' => 'https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583886045/descarga_1_xvnrrv.jpg'
            ]
            );
    }
}
