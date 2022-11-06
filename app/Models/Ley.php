<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ley extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'ley';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $fillable = [
        'id',
        'id_conductor',
        'fecha_entrada',
        'fecha_salida',
        'cliente',
        'producto',
        'cargue',
        'descargue',
        'ciudad_entrada',
        'ciudad_salida',
        'peso_entrada',
        'peso_salida',
        'observaciones',
        'fecha_registro',
        'tiempo_registro',
        'created_at',
        'updated_at'
    ];
}
