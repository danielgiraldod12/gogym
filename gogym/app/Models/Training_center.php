<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_center extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }


}
