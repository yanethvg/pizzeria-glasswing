<?php

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name"=>"Administrador",
            "slug"=>"admin",
            "description"=>" Administrador con ciertos permisos en el sistema"
            ]);

        Role::create([
            "name"=>"Cliente",
            "slug"=>"cliente",
            "description"=>"Cliente del Sistema de Pizza"
            ]);

    }
}
