<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 200)->create()->each(function($order){
                $order->pizzas()->sync([rand(2,6),rand(2,6)]);
        });

    }
}
