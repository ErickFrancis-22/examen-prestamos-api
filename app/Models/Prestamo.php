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
        'fechPrestamo',
        'fechDevolucion',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'cantidad' => 'integer',
            'fechPrestamo' => 'date:Y-m-d',
            'fechDevolucion' => 'date:Y-m-d',
        ];
    }
}
