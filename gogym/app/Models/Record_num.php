<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record_num extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //Relacion uno a muchos (inversa)

    public function training_program(){
        return $this->belongsTo('App\Models\Training_program');
    }
}
