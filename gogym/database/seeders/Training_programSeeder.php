<?php

namespace Database\Seeders;

use App\Models\Training_program;
use Illuminate\Database\Seeder;

class Training_programSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Training_program = new Training_program();
        $Training_program->name_program = "ADSI";
        $Training_program->save();

        $Training_program2 = new Training_program();
        $Training_program2->name_program = "Multimedia";
        $Training_program2->save();
    }
}
