<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        $this->call(Training_programSeeder::class);

        $this->call(Training_centerSeeder::class);

        $this->call(Record_numSeeder::class);

        $this->call(RolSeeder::class);

        $this->call(MyUserSeeder::class);

        $this->call(UserSeeder::class);
/* 
        $this->call(eventSeeder::class); */

        /* $this->call(eventSeeder::class); */

    }
}
