<?php

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'username'   => 'admin',
            'email'      => 'admin@glasswing.com',
            'password'   =>  Hash::make('secret')
        ])->roles()->sync(1);

        User::create([
            'name' => 'Erick',
            'username'   => 'Erick',
            'email'      => 'erick94@gmail.com',
            'password'   =>  Hash::make('perritochulo')
        ])->roles()->sync(2);

        User::create([
            'name' => 'Zoila',
            'username'   => 'Zoila',
            'email'      => 'zoila@gmail.com',
            'password'   =>  Hash::make('cloe')
        ])->roles()->sync(2);

        User::create([
            'name' => 'Cliente',
            'username'   => 'cliente',
            'email'      => 'cliente@glasswing.com',
            'password'   =>  Hash::make('secret')
        ])->roles()->sync(2);

        User::create([
            'name' => 'Cliente2',
            'username'   => 'cliente2',
            'email'      => 'cliente2@glasswing.com',
            'password'   =>  Hash::make('secret')
        ])->roles()->sync(2);

        User::create([
            'name' => 'Cliente3',
            'username'   => 'cliente3',
            'email'      => 'cliente3@glasswing.com',
            'password'   =>  Hash::make('secret')
        ])->roles()->sync(2);

        factory(App\User::class, 100)->create()->each(function($user){
            $user->roles()->sync(2);
        });

    }
}
