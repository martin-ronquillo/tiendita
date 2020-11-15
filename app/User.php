<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 
        'name', 
        'apellido_pater', 
        'apellido_mater', 
        'provincia_id', 
        'direc', 
        'tlf', 
        'api_token', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function compras(){
        return $this->hasMany(Compra::class);
    }

    public function ventas(){
        return $this->hasMany(Venta::class);
    }

    public function favoritos(){
        return $this->hasMany(Favorito::class);
    }

    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

    public function provincias(){
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }
}
