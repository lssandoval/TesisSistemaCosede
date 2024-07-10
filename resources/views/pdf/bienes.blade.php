<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Bienes Actuales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0ad4e; /* amarillo */
            color: white;
            font-size: 14px;
            font-weight: normal;
        }
        tr:nth-child(even) {
            background-color: #5bc0de; /* azul */
            color: white;
        }
        tr:nth-child(odd) {
            background-color: #d9534f; /* rojo */
            color: white;
        }
        .info {
            margin-top: 20px;
            padding: 10px;
            background-color: #337ab7; /* azul oscuro */
            color: white;
            text-align: center;
        }
        .detalle {
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Reporte Bienes Actuales</h1>
    <div class="info">
        <span>Fecha de creación:</span> {{ now()->format('d/m/Y') }}<br>
        <span>Creador:</span> {{ Auth::user()->name }} <!-- Ajustar según cómo obtienes el nombre del usuario logueado -->
    </div>
    @foreach($bienes as $bien)
        <table>
            <thead>
                <tr>
                    <th colspan="2">Detalles Principales</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID:</td>
                    <td>{{ $bien->id }}</td>
                </tr>
                <tr>
                    <td>Código Bien:</td>
                    <td>{{ $bien->codigo_bien }}</td>
                </tr>
                <tr>
                    <td>Código Anterior:</td>
                    <td>{{ $bien->codigo_anterior }}</td>
                </tr>
                <tr>
                    <td>Custodio Actual:</td>
                    <td>{{ $bien->custodio_actual }}</td>
                </tr>
                <tr>
                    <td>Bodega:</td>
                    <td>{{ $bien->bodega }}</td>
                </tr>
                <tr>
                    <td>Custodio Activo:</td>
                    <td>{{ $bien->custodio_activo }}</td>
                </tr>
            </tbody>
        </table>
        <div class="detalle">
            <strong>Detalles Completos:</strong><br>
            <strong>Identificador:</strong> {{ $bien->identificador }}<br>
            <strong>Nro de Acta/Matriz:</strong> {{ $bien->nro_acta_matriz }}<br>
            <strong>(BLD) o (BCA):</strong> {{ $bien->bld_bca }}<br>
            <strong>Bien:</strong> {{ $bien->bien }}<br>
            <strong>Serie/Identificación:</strong> {{ $bien->serie_identificacion }}<br>
            <strong>Modelo/Características:</strong> {{ $bien->modelo_caracteristicas }}<br>
            <strong>Marca/Otros:</strong> {{ $bien->marca_otros }}<br>
            <strong>Crítico:</strong> {{ $bien->critico }}<br>
            <strong>Moneda:</strong> {{ $bien->moneda }}<br>
            <strong>Valor de Compra:</strong> {{ $bien->valor_compra }}<br>
            <strong>Recompra:</strong> {{ $bien->recompra }}<br>
            <strong>Color:</strong> {{ $bien->color }}<br>
            <strong>Material:</strong> {{ $bien->material }}<br>
            <strong>Dimensiones:</strong> {{ $bien->dimensiones }}<br>
            <strong>Condición del Bien:</strong> {{ $bien->condicion_bien }}<br>
            <strong>Habilitado:</strong> {{ $bien->habilitado }}<br>
            <strong>Estado Bien:</strong> {{ $bien->estado_bien }}<br>
            <strong>Id Ubicación:</strong> {{ $bien->id_ubicacion }}<br>
            <strong>Ubicación de Bodega:</strong> {{ $bien->ubicacion_bodega }}<br>
            <strong>Nro de Cédula/RUC:</strong> {{ $bien->nro_cedula_ruc }}<br>
            <strong>Origen del Ingreso:</strong> {{ $bien->origen_ingreso }}<br>
            <strong>Tipo de Ingreso:</strong> {{ $bien->tipo_ingreso }}<br>
            <strong>Nro de Compromiso:</strong> {{ $bien->nro_compromiso }}<br>
            <strong>Estado del Acta:</strong> {{ $bien->estado_acta }}<br>
            <strong>Contabilizado del Acta:</strong> {{ $bien->contabilizado_acta }}<br>
            <strong>Contabilizado del Bien:</strong> {{ $bien->contabilizado_bien }}<br>
            <strong>Descripción:</strong> {{ $bien->descripcion }}<br>
            <strong>Item/Renglón:</strong> {{ $bien->item_renglon }}<br>
            <strong>Cuenta Contable:</strong> {{ $bien->cuenta_contable }}<br>
            <strong>Depreciable:</strong> {{ $bien->depreciable }}<br>
            <strong>Fecha de Creación:</strong> {{ $bien->fecha_creacion }}<br>
            <strong>Fecha de Ingreso:</strong> {{ $bien->fecha_ingreso }}<br>
            <strong>Fecha Última Depreciación:</strong> {{ $bien->fecha_ultima_depreciacion }}<br>
            <strong>Vida Útil:</strong> {{ $bien->vida_util }}<br>
            <strong>Fecha Término Depreciación:</strong> {{ $bien->fecha_termino_depreciacion }}<br>
            <strong>Valor Contable:</strong> {{ $bien->valor_contable }}<br>
            <strong>Valor Residual:</strong> {{ $bien->valor_residual }}<br>
            <strong>Valor en Libros:</strong> {{ $bien->valor_en_libros }}<br>
            <strong>Valor Depreciación Acumulada:</strong> {{ $bien->valor_depreciacion_acumulada }}<br>
            <strong>Comodato:</strong> {{ $bien->comodato }}<br>
            <strong>Fecha Creación:</strong> {{ $bien->created_at }}<br>
            <strong>Fecha Actualización:</strong> {{ $bien->updated_at }}<br>
        </div>
    @endforeach
</body>
</html>
