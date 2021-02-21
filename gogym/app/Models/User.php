<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'typeOfIdentification',
        'identification_num',
        'id_record_num',
        'id_training_program',
        'id_training_center',
        'id_rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_profile_url(){
        return 'show';
    }

    //Relacion uno a muchos (inversa)
    public function record_num(){
        return $this->belongsTo('App\Models\Record_num');
    }
    public function training_program(){
        return $this->belongsTo('App\Models\Training_program');
    }
    public function training_center(){
        return $this->belongsTo('App\Models\Training_center');
    }
    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }

    //Relacion uno a muchos
    public function asistencias(){
        return $this->hasMany('App\Models\Asist');
    }
    public function eventos(){
        return $this->hasMany('App\Models\Event');
    }

}

