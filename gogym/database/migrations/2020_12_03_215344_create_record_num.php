<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordNum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_nums', function (Blueprint $table) {
            $table->id();
            $table->integer('record_num'); //ficha
            $table->unsignedBigInteger('id_training_program');
            $table->timestamps();

            $table->foreign('id_training_program')
            ->references('id')->on('training_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_nums');
    }
}
