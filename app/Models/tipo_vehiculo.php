<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_vehiculo extends Model
{
    protected $table = 'tipo_vehiculo';  

    use HasFactory;
    public $fillable = [
        'id',
        'tipo',
        'created_at',
        'updated_at'
    ];
}
