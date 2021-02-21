<?php

namespace Database\Seeders;

use App\Models\Training_center;
use Illuminate\Database\Seeder;

class Training_centerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Training_center = new Training_center();

        $Training_center->name_center = "CTGI";
        $Training_center->save();
    }
}
