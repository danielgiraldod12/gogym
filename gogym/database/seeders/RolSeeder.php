<?php

namespace Database\Seeders;

use App\Models\Rol;
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
        $Rol = new Rol();
        $Rol->rol_name = "Administrador";
        $Rol->save();

        $Rol2 = new Rol();
        $Rol2->rol_name = "Moderador";
        $Rol2->save();

        $Rol3 = new Rol();
        $Rol3->rol_name = "Usuario";
        $Rol3->save();
    }
}
