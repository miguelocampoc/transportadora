<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Conductor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   
    protected $table = 'conductores';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'placa',
        'licencia',
        'fecha_registro',
        'tiempo_registro',
        'email',
        'created_at',
        'updated_at'
    ];
}
