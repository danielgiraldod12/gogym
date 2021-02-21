<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = new User();

        $User->name = "daniel";
        $User->typeOfIdentification = "T.I";
        $User->identification_num = "1001227025";
        $User->email = "daniskzo12@gmail.com";
        $User->id_record_num = "1";
        $User->id_training_program = "1";
        $User->id_training_center = "1";
        $User->id_rol = "1";
        $User->password = Hash::make("12345678");
        $User->save();
    }
}
