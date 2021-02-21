<?php

namespace Database\Seeders;

use App\Models\Record_num;
use Illuminate\Database\Seeder;


class Record_numSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Record_num = new Record_num();

        $Record_num->record_num = "2061250";
        $Record_num->id_training_program = "1";
        $Record_num->save();

        $Record_num2 = new Record_num();

        $Record_num2->record_num = "2061277";
        $Record_num2->id_training_program = "1";
        $Record_num2->save();
    }
}
