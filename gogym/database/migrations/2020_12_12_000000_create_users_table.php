<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('typeOfIdentification'); //tipo doc
            $table->integer('identification_num')->unique(); //num doc
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_record_num')->nullable();//ficha
            $table->unsignedBigInteger('id_training_program')->nullable();//programa
            $table->unsignedBigInteger('id_training_center')->nullable(); //centro
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();

            $table->foreign('id_record_num')
                ->references('id')->on('record_nums');
               // ->onUpdate('set null');

            $table->foreign('id_training_program')
                ->references('id')->on('training_programs');
               // ->onUpdate('set null');

            $table->foreign('id_training_center')
                ->references('id')->on('training_centers');
               // ->onUpdate('set null');

            $table->foreign('id_rol')
                ->references('id')->on('rols');
               // ->onUpdate('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
