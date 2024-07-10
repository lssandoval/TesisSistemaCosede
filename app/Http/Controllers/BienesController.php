<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nuevat;
use Illuminate\Support\Facades\Log;

class BienesController extends Controller
{
    public $id;
    public $codigo_bien;

    public function variables($id, $codigo_bien)
    {
        $this->id = $id;
        $this->codigo_bien = $codigo_bien;
    }

    public function index(Request $request)
    {
        return view('tabla_bienes');
    }

    public function bienes()
    {
        $bienes = Nuevat::all();
        return datatables()->of($bienes)->toJson();
    }

    public function eliminar(Request $request)
    {
        // Logs para mostrar la información recibida
        Log::info('Solicitud recibida para eliminar bien.', [
            'codigo_bien' => $request->codigo_bien,
        ]);

        // Validación básica, asegúrate de implementar la lógica adecuada de validación según tu caso
        $request->validate([
            'codigo_bien' => 'required|exists:nuevat,codigo_bien',
        ]);

        // Logs para mostrar que la validación ha pasado correctamente
        Log::info('Validación pasada para eliminar bien.');

        // Eliminar el bien
        Nuevat::where('codigo_bien', $request->codigo_bien)->delete();

        // Logs para mostrar que el bien ha sido eliminado correctamente
        Log::info('Bien eliminado correctamente.', [
            'codigo_bien' => $request->codigo_bien,
        ]);

        return response()->json(['success' => true, 'message' => 'Bien eliminado correctamente.']);
    }

    public function editarBien($id)
    {
        $bien = Nuevat::find($id);

        if (!$bien) {
            return redirect()->route('bienes')->with('error', 'Bien no encontrado.');
        }

        return view('editar_bien', compact('bien'));
    }

    public function actualizarBien(Request $request, $id)
    {
        $request->validate([
            'codigo_bien' => 'required|string|max:255',
            // Añade aquí las demás validaciones para los campos
        ]);

        $bien = Nuevat::find($id);

        if (!$bien) {
            return redirect()->route('bienes')->with('error', 'Bien no encontrado.');
        }

        $bien->codigo_bien = $request->codigo_bien;
        // Actualiza aquí los demás campos

        $bien->save();

        return redirect()->route('bienes')->with('success', 'Bien actualizado correctamente.');
    }
}
