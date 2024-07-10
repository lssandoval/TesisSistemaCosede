<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Transaccion;
use App\Models\ArchivoHistorial; // Modelo para el historial de archivos

class ArchivoController extends Controller
{
    public function subirArchivo(Request $request)
    {
        // Verificar si se ha enviado un archivo
        if ($request->hasFile('archivo')) {
            // Validar el archivo
            $request->validate([
                'archivo' => 'required|mimes:xlsx,xls|max:2048', // Tipos de archivo permitidos: xlsx, xls, tamaño máximo: 2MB
            ]);

            // Obtener el archivo
            $archivo = $request->file('archivo');

            // Mover el archivo a la ubicación deseada (public/Excels)
            $archivo->move(public_path('Excels'), $archivo->getClientOriginalName());

            // Obtener la ruta del archivo
            $filePath = public_path('Excels') . '/' . $archivo->getClientOriginalName();

            // Crear un objeto lector de PhpSpreadsheet utilizando la fábrica IOFactory
            $reader = IOFactory::createReader('Xlsx');

            // Cargar el archivo Excel en un objeto Spreadsheet
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            foreach ($worksheet->getRowIterator() as $row) {
                $data = [];
                foreach ($row->getCellIterator() as $cell) {
                    $data[] = $cell->getValue();
                }

                // Verificar si el primer valor (código) no está vacío y si el array $data tiene al menos 46 elementos
                if (!empty($data[0]) && count($data) >= 46) {
                    // Crear una nueva instancia del modelo Transaccion
                    if ($data[34] === '141.01.07' || $data[34] === '141.01.04') {
                        $transaccion = new Transaccion();
                        // Asignar los valores de la fila al modelo
                        $transaccion->codigo_bien = $data[0];
                        $transaccion->codigo_anterior = $data[1];
                        $transaccion->identificador = $data[2];
                        $transaccion->nro_acta_matriz = $data[3];
                        $transaccion->bld_bca = $data[4];
                        $transaccion->bien = $data[5];
                        $transaccion->serie_identificacion = $data[6];
                        $transaccion->modelo_caracteristicas = $data[7];
                        $transaccion->marca_otros = $data[8];
                        $transaccion->critico = $data[9];
                        $transaccion->moneda = $data[10];
                        $transaccion->valor_compra = $data[11];
                        $transaccion->recompra = $data[12];
                        $transaccion->color = $data[13];
                        $transaccion->material = $data[14];
                        $transaccion->dimensiones = $data[15];
                        $transaccion->condicion_bien = $data[16];
                        $transaccion->habilitado = $data[17];
                        $transaccion->estado_bien = $data[18];
                        $transaccion->id_bodega = $data[19];
                        $transaccion->bodega = $data[20];
                        $transaccion->id_ubicacion = $data[21];
                        $transaccion->ubicacion_bodega = $data[22];
                        $transaccion->nro_cedula_ruc = $data[23];
                        $transaccion->custodio_actual = $data[24];
                        $transaccion->custodio_activo = $data[25];
                        $transaccion->origen_ingreso = $data[26];
                        $transaccion->tipo_ingreso = $data[27];
                        $transaccion->nro_compromiso = $data[28];
                        $transaccion->estado_acta = $data[29];
                        $transaccion->contabilizado_acta = $data[30];
                        $transaccion->contabilizado_bien = $data[31];
                        $transaccion->descripcion = $data[32];
                        $transaccion->item_renglon = $data[33];
                        $transaccion->cuenta_contable = $data[34];
                        $transaccion->depreciable = $data[35];
                        $transaccion->fecha_creacion = $data[36];
                        $transaccion->fecha_ingreso = $data[37];
                        $transaccion->fecha_ultima_depreciacion = $data[38];
                        $transaccion->vida_util = $data[39];
                        $transaccion->fecha_termino_depreciacion = $data[40];
                        $transaccion->valor_contable = $data[41];
                        $transaccion->valor_residual = $data[42];
                        $transaccion->valor_en_libros = $data[43];
                        $transaccion->valor_depreciacion_acumulada = $data[44];
                        $transaccion->comodato = $data[45];

                        // Guardar el modelo en la base de datos
                        $transaccion->save();
                    }
                }
            }

            // Guardar la información del archivo en el historial
            ArchivoHistorial::create([
                'usuario' => Auth::user()->name, // o 'Auth::user()->email' o cualquier otra información del usuario
                'nombre_archivo' => $archivo->getClientOriginalName(),
                'fecha_subida' => now(),
            ]);

            // Redirigir de vuelta a la página desde la que se hizo la solicitud
            return Redirect::back()->with('success', 'Archivo subido correctamente');
        }

        // Si no se envió ningún archivo, devolver un mensaje de error
        return Redirect::back()->with('error', 'No se ha enviado ningún archivo');
    }

    public function historialCarga()
    {
        // Obtener el historial de archivos
        $historial = ArchivoHistorial::all();

        // Devolver la vista con el historial
        return view('reporte.historial-carga', compact('historial'));
    }
}
