<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienesController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\GenerarListaQRController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PdfController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas relacionadas con los bienes
    Route::get('/bienes', [BienesController::class, 'index'])->name('bienes');
    Route::get('datatable/bienes', [BienesController::class, 'bienes'])->name('datatable.bienes');
    Route::get('/editar-bien/{id}', [BienesController::class, 'editarBien'])->name('editar-bien');
    Route::delete('/eliminar-bien', [BienesController::class, 'eliminar'])->name('eliminar-bien');
    Route::put('/actualizar-bien/{id}', [BienesController::class, 'actualizarBien'])->name('actualizar-bien');

    // Rutas relacionadas con archivos
    Route::post('/subir-archivo', [ArchivoController::class, 'subirArchivo'])->name('subirArchivo');
    Route::get('/historial-carga', [ArchivoController::class, 'historialCarga'])->name('historial-carga');

    // Ruta para generar código QR
    Route::post('/generate-qrcode', [QRCodeController::class, 'generateQR'])->name('generate-qrcode');

    // Ruta para generar lista de QRs
    Route::post('/generar-qrs', [GenerarListaQRController::class, 'generateQRCodes'])->name('generar.qrs');
    Route::get('/bienesl', [GenerarListaQRController::class, 'index'])->name('bienes.index');
    Route::get('/generar-excel', [GenerarListaQRController::class, 'generateExcel'])->name('generar.excel');

    // Rutas Mantenimientos
    Route::get('/mantenimientos/{id}', [MantenimientoController::class, 'mostrarMantenimientos'])->name('mostrarMantenimientos.mostrar');
    Route::post('/mantenimientos/guardar', [MantenimientoController::class, 'guardarMantenimiento'])->name('guardar-mantenimiento');
    // Ruta de Asignación de Roles
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');

    // Generar PDF
    Route::get('/generar-pdf', [PdfController::class, 'generarPdf'])->name('generar.pdf');
});
