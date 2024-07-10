<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class GenerarListaQRController extends Controller
{
    public function index()
    {
        // Obtener todas las transacciones de la base de datos
        $transacciones = Transaccion::all();
        // Pasar las transacciones a la vista
        return view('tabla_bienes', compact('transacciones'));
    }

    public function generateQRCodes(Request $request)
    {
        // Obtener todas las transacciones de la base de datos
        $transacciones = Transaccion::all();

        foreach ($transacciones as $transaccion) {
            $data = [
                'id' => $transaccion->id,
                'codigo_bien' => $transaccion->codigo_bien,
            ];

            // Concatenar los datos en una cadena para el contenido del código QR
            $contenidoQR = "ID: {$data['id']}, Código Bien: {$data['codigo_bien']}";

            // Instanciar el renderizador de imagen con Imagick
            $renderer = new ImageRenderer(
                new RendererStyle(300), // Reducir el tamaño a 300
                new ImagickImageBackEnd()
            );

            // Instanciar el escritor
            $writer = new Writer($renderer);

            try {
                // Generar el código QR en memoria
                $qrCodeData = $writer->writeString($contenidoQR);

                // Generar un nombre único para el archivo JPEG
                $fileName = 'qr_code_' . $data['codigo_bien'] . '.jpg';

                // Guardar el código QR en el almacenamiento de Laravel
                Storage::disk('public')->put('Qrcodes/' . $fileName, $qrCodeData);

                // Log de éxito
                Log::info("Código QR generado exitosamente para ID: {$data['id']}, Código Bien: {$data['codigo_bien']}");
            } catch (\Exception $e) {
                // Log del error detallado
                Log::error("Error al generar el código QR: {$e->getMessage()}");
            }
        }

        // Redirigir de vuelta a la página desde la que se hizo la solicitud
        return Redirect::back()->with('success', 'Códigos QR generados correctamente para todos los bienes.');
    }

    public function generateExcel()
    {
        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Obtener todas las transacciones de la base de datos
        $transacciones = Transaccion::all();

        // Establecer los encabezados
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Código Bien');
        $sheet->setCellValue('C1', 'Código QR');

        // Definir el tamaño para las imágenes del QR
        $imageWidth = 100;
        $imageHeight = 100;

        // Iterar sobre las transacciones y agregar los datos a la hoja de cálculo
        $row = 2; // Comenzar en la segunda fila
        foreach ($transacciones as $transaccion) {
            $data = [
                'id' => $transaccion->id,
                'codigo_bien' => $transaccion->codigo_bien,
            ];

            // Agregar datos a las celdas
            $sheet->setCellValue('A' . $row, $data['id']);
            $sheet->setCellValue('B' . $row, $data['codigo_bien']);

            // Obtener la ruta del código QR generado anteriormente
            $fileName = 'qr_code_' . $data['codigo_bien'] . '.jpg';
            $qrCodePath = storage_path('app/public/Qrcodes/' . $fileName);

            // Verificar si el archivo QR existe
            if (file_exists($qrCodePath)) {
                // Insertar la imagen del QR en la celda
                $drawing = new Drawing();
                $drawing->setName('QR Code');
                $drawing->setDescription('QR Code');
                $drawing->setPath($qrCodePath);
                $drawing->setHeight($imageHeight);
                $drawing->setWidth($imageWidth);
                $drawing->setCoordinates('C' . $row);

                // Ajustar la posición de la imagen dentro de la celda (opcional)
                $drawing->setOffsetX(5); // Ajuste horizontal
                $drawing->setOffsetY(5); // Ajuste vertical

                // Insertar la imagen en la celda
                $sheet->getRowDimension($row)->setRowHeight($imageHeight + 10); // Ajustar la altura de la fila si es necesario
                $sheet->setCellValue('C' . $row, ''); // Asegurar que la celda contenga algún valor para que la imagen se inserte correctamente
                $drawing->setWorksheet($sheet);
            } else {
                $sheet->setCellValue('C' . $row, 'QR no encontrado');
            }

            $row++;
        }

        // Establecer el ancho de las columnas
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(30);

        // Guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'lista_codigos_qr.xlsx';
        $filePath = public_path($fileName);
        $writer->save($filePath);

        // Devolver el archivo para su descarga
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
