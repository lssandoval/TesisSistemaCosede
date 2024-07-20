<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Settings;
use App\Models\Transaccion;
use App\Models\TransaccionComponentes;
use App\Models\ArchivoHistorial;

class ArchivoController extends Controller
{
    public function __construct()
    {
        // Configurar PhpSpreadsheet para usar menos memoria
        Settings::setLibXmlLoaderOptions(LIBXML_PARSEHUGE);
    }

    public function subirArchivo(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $request->validate([
                'archivo' => 'required|mimes:xlsx,xls|max:20480',
            ]);

            $archivo = $request->file('archivo');
            $archivo->move(public_path('Excels'), $archivo->getClientOriginalName());
            $filePath = public_path('Excels') . '/' . $archivo->getClientOriginalName();

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            $chunkSize = 1000; // Tamaño del fragmento
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            
            for ($startRow = 1; $startRow <= $highestRow; $startRow += $chunkSize) {
                $endRow = min($startRow + $chunkSize - 1, $highestRow);

                for ($row = $startRow; $row <= $endRow; $row++) {
                    $data = [];
                    for ($col = 'A'; $col <= $highestColumn; $col++) {
                        $cellValue = $worksheet->getCell($col . $row)->getValue();
                        $data[] = $cellValue;
                    }

                    if (!empty($data[0]) && count($data) >= 20) {
                        $transaccion = new Transaccion();
                        $transaccion->codigo_bien = $data[0];
                        $transaccion->en_uso = $data[1];
                        $transaccion->tipo = $data[2];
                        $transaccion->marca = $data[3];
                        $transaccion->modelo = $data[4];
                        $transaccion->serial = $data[5];
                        $transaccion->ubicacion = $data[6];
                        $transaccion->custodio_identificado = $data[7];
                        $transaccion->fecha_ingreso = $data[8];
                        $transaccion->periodo_garantia = $data[9];
                        $transaccion->proveedor = $data[10];
                        $transaccion->estado = $data[11];
                        $transaccion->fecha_ultimo_mantenimiento = $data[12];
                        $transaccion->recomendacion_1 = $data[13];
                        $transaccion->recomendacion_2 = $data[14];
                        $transaccion->cedula_esbye = $data[15];
                        $transaccion->custodio_esbye = $data[16];
                        $transaccion->serial_esbye = $data[17];
                        $transaccion->modelo_esbye = $data[18];
                        $transaccion->descripcion_esbye = $data[19];
                        $transaccion->save();
                    }
                }
            }

            ArchivoHistorial::create([
                'usuario' => Auth::user()->name,
                'nombre_archivo' => $archivo->getClientOriginalName(),
                'fecha_subida' => now(),
            ]);

            return Redirect::back()->with('success', 'Archivo subido correctamente');
        }

        return Redirect::back()->with('error', 'No se ha enviado ningún archivo');
    }

    public function subirArchivoComponentes(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $request->validate([
                'archivo' => 'required|mimes:xlsx,xls|max:2048',
            ]);

            $archivo = $request->file('archivo');
            $archivo->move(public_path('Excels'), $archivo->getClientOriginalName());
            $filePath = public_path('Excels') . '/' . $archivo->getClientOriginalName();

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            $chunkSize = 1000;
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            
            for ($startRow = 1; $startRow <= $highestRow; $startRow += $chunkSize) {
                $endRow = min($startRow + $chunkSize - 1, $highestRow);

                for ($row = $startRow; $row <= $endRow; $row++) {
                    $data = [];
                    for ($col = 'A'; $col <= $highestColumn; $col++) {
                        $cellValue = $worksheet->getCell($col . $row)->getValue();
                        $data[] = $cellValue;
                    }

                    if (!empty($data[0]) && count($data) >= 4) {
                        $transaccionC = new TransaccionComponentes();
                        $transaccionC->codigo_bien = $data[0];
                        $transaccionC->codigo_bien_compuesto = $data[1];
                        $transaccionC->tipo = $data[2];
                        $transaccionC->descripcion = $data[3];
                        $transaccionC->save();
                    }
                }
            }

            ArchivoHistorial::create([
                'usuario' => Auth::user()->name,
                'nombre_archivo' => $archivo->getClientOriginalName(),
                'fecha_subida' => now(),
            ]);

            return Redirect::back()->with('success', 'Archivo subido correctamente');
        }

        return Redirect::back()->with('error', 'No se ha enviado ningún archivo');
    }

    public function historialCarga()
    {
        $historial = ArchivoHistorial::all();
        return view('reporte.historial-carga', compact('historial'));
    }
}
