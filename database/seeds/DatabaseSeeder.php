<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(PizzasSeeder::class);
        $this->call(DetallePizzaSeeder::class);
        $this->call(OrdenSeeder::class);
        $this->call(SucursalSeeder::class);
    }
}
