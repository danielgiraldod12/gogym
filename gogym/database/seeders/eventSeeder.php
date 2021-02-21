<?php

namespace Database\Seeders;

use Database\Factories\EventsFactory;
use App\Models\Event;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(10)->create();
    }
}
