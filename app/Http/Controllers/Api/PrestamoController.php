<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    // GET /api/prestamos
    public function index()
    {
        return response()->json(
            Prestamo::orderByDesc('id')->get()
        );
    }

    // POST /api/prestamos
    public function store(Request $request)
    {
        $datos = $request->validate([
            'equipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'solicitante' => 'required|string|max:255',
            'fechPrestamo' => 'required|date_format:Y-m-d',
            'fechDevolucion' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:fechPrestamo',
            ],
            'estado' => 'required|string|max:50',
        ]);

        $prestamo = Prestamo::create($datos);

        return response()->json([
            'message' => 'Préstamo creado correctamente',
            'prestamo' => $prestamo,
        ], 201);
    }

    // GET /api/prestamos/{prestamo}
    public function show(Prestamo $prestamo)
    {
        return response()->json($prestamo);
    }

    // PUT /api/prestamos/{prestamo}
    public function update(Request $request, Prestamo $prestamo)
    {
        $datos = $request->validate([
            'equipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'solicitante' => 'required|string|max:255',
            'fechPrestamo' => 'required|date_format:Y-m-d',
            'fechDevolucion' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:fechPrestamo',
            ],
            'estado' => 'required|string|max:50',
        ]);

        $prestamo->update($datos);

        return response()->json([
            'message' => 'Préstamo actualizado correctamente',
            'prestamo' => $prestamo->fresh(),
        ]);
    }

    // DELETE /api/prestamos/{prestamo}
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        return response()->json([
            'message' => 'Préstamo eliminado correctamente',
        ]);
    }
}
