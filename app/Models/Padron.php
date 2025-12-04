<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padron extends Model
{
    /** @use HasFactory<\Database\Factories\PadronFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'curp',
        'entidad',
        'tipo_telefono'
    ];
}
