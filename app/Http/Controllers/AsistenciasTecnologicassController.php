<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaTecnologica;
use Illuminate\Http\Request;
use App\Models\Estado;

class AsistenciasTecnologicassController extends Controller
{
    public function index()
    {
        $asistencias = AsistenciaTecnologica::with('estado')->get();
        $estados = Estado::all(); // Obtener todos los estados
        
        return view('asistencias_tecnologicas', compact('asistencias', 'estados'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'tipo_requerimiento' => 'required|string|max:255',
            'solicitante' => 'required|string|max:255',
            'fecha_solicitud' => 'required|date',
            'tipo_bien' => 'required|string|max:255',
            'estado_id' => 'required|exists:estados,id',
        ]);

        // Crear una nueva asistencia tecnológica
        AsistenciaTecnologica::create([
            'tipo_requerimiento' => $request->tipo_requerimiento,
            'solicitante' => $request->solicitante,
            'fecha_solicitud' => $request->fecha_solicitud,
            'tipo_bien' => $request->tipo_bien,
            'estado_id' => $request->estado_id,
        ]);

        // Redirigir a la vista con un mensaje de éxito
        return redirect()->route('asistencias_tecnologicas')->with('success', 'Asistencia tecnológica creada con éxito.');
    }

    
}
