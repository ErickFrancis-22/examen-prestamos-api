<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'equipo',
        'cantidad',
        'solicitante',
        'fechaPrestamo',
        'fechaDevolucion',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'cantidad' => 'integer',
            'fechaPrestamo' => 'date:Y-m-d',
            'fechaDevolucion' => 'date:Y-m-d',
        ];
    }
}
