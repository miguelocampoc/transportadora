<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';  

    use HasFactory;
    
    public $fillable = [
        'id',
        'id_conductor',
        'peso',
        'placa',
        'estado',
        'fecha_registro',
        'tiempo_registro',
        'id_tipo',
        'created_at',
        'updated_at'
    ];
}
