
$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var tablaBienes = $('#tablaBienes').DataTable({
        ajax: routeBienes,
        columns: [
            {
                data: null,
                className: 'fixed-column',
                render: function (data, type, row) {
                    return `
                        <div class="flex flex-col justify-center items-center space-y-2 px-2">
                            <button type="button" class="btn btn-link text-info btnShowInfo" title="Mostrar Información" data-id="${data.id}">
                                <i class="fa-solid fa-info-circle fa-lg"></i>
                            </button>
                        </div>`;
                }
            },
            {
                data: null,
                className: 'fixed-column',
                render: function (data, type, row) {
                    return `
                        <div class="grid grid-cols-2 gap-2 justify-center items-center px-2">
                            <!-- Columna izquierda: Modificar y Eliminar -->
                            <div class="flex flex-col space-y-2">
                                <button type="button" class="btn btn-link text-warning btnEdit" title="Modificar" onclick="window.location.href='/editar-bien/${data.id}'">
                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-link text-danger btnDelete" title="Eliminar" data-id="${data.id}" data-codigo_bien="${data.codigo_bien}">
                                    <i class="fa-solid fa-trash fa-lg"></i>
                                </button>
                            </div>
                            <!-- Columna derecha: QR y Mantenimientos -->
                            <div class="flex flex-col space-y-2">
                                <button type="button" class="btn btn-link nav-link text-actualizar btnShowModalQR" title="Botón Cargar QR" data-id="${data.id}" data-codigo_bien="${data.codigo_bien}">
                                    <i class="fa-solid fa-qrcode fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-link text-info btnMaintenance" title="Mantenimientos" onclick="window.location.href='/mantenimientos/${data.id}'">
                                    <i class="fa-solid fa-screwdriver-wrench fa-lg"></i>
                                </button>
                            </div>
                        </div>`;
                }
            },
            { data: 'id' },
            { data: 'codigo_bien' },
            { data: 'codigo_anterior' },
            { data: 'identificador' },
            { data: 'nro_acta_matriz' },
            { data: 'bld_bca' },
            { data: 'bien' },
            { data: 'serie_identificacion' },
            { data: 'modelo_caracteristicas' },
            { data: 'marca_otros' },
            { data: 'critico' },
            { data: 'moneda' },
            { data: 'valor_compra' },
            { data: 'recompra' },
            { data: 'color' },
            { data: 'material' },
            { data: 'dimensiones' },
            { data: 'condicion_bien' },
            { data: 'habilitado' },
            { data: 'estado_bien' },
            { data: 'id_bodega' },
            { data: 'bodega' },
            { data: 'id_ubicacion' },
            { data: 'ubicacion_bodega' },
            { data: 'nro_cedula_ruc' },
            { data: 'custodio_actual' },
            { data: 'custodio_activo' },
            { data: 'origen_ingreso' },
            { data: 'tipo_ingreso' },
            { data: 'nro_compromiso' },
            { data: 'estado_acta' },
            { data: 'contabilizado_acta' },
            { data: 'contabilizado_bien' },
            { data: 'descripcion' },
            { data: 'item_renglon' },
            { data: 'cuenta_contable' },
            { data: 'depreciable' },
            { data: 'fecha_creacion' },
            { data: 'fecha_ingreso' },
            { data: 'fecha_ultima_depreciacion' },
            { data: 'vida_util' },
            { data: 'fecha_termino_depreciacion' },
            { data: 'valor_contable' },
            { data: 'valor_residual' },
            { data: 'valor_en_libros' },
            { data: 'valor_depreciacion_acumulada' },
            { data: 'comodato' },
            { data: 'created_at' },
            { data: 'updated_at' },

        ],
        responsive: true,
        autoWidth: false,
        language: {
            lengthMenu: 'Mostrar _MENU_ registros por página',
            zeroRecords: 'No hay registros - intenta otra vez',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(filtrado de _MAX_ registros totales)',
            search: 'Buscar:',
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior'
            }
        }
    });

    // Evento para abrir el modal de edición
    $('#tablaBienes').on('click', '.btnShowModalQR', function () {
        var id = $(this).data('id');
        var codigo_bien = $(this).data('codigo_bien');

        $.ajax({
            url: generateQRUrl,
            method: "POST",
            data: {
                id: id,
                codigo_bien: codigo_bien,
                _token: token
            },
            success: function (response) {
                $('#modalQRId').text(id);
                $('#modalQRCodigoBien').text(codigo_bien);
                $('#modalQRCode').html(response.qrCode);
                $('#modalQR').modal('show');
            },
            error: function (xhr) {
                console.error('Error al generar el código QR:', xhr);
            }
        });
    });

    // Evento para abrir el modal de QR
    // Evento para abrir el modal de QR
    $('#tablaBienes').on('click', '.btnShowModalQR', function () {
        var id = $(this).data('id');
        var codigo_bien = $(this).data('codigo_bien');

        $.ajax({
            url: generateQRUrl,
            method: "POST",
            data: {
                id: id,
                codigo_bien: codigo_bien,
                _token: token
            },
            success: function (response) {
                $('#modalQRId').text(id);
                $('#modalQRCodigoBien').text(codigo_bien);
                $('#modalQRCode').html(`<img src="${response.qr_code_url}" alt="QR Code">`);
                $('#modalQR').modal('show');
            },
            error: function (xhr) {
                console.error('Error al generar el código QR:', xhr);
            }
        });
    });


    $('#tablaBienes').on('click', '.btnShowInfo', function () {
        var id = $(this).data('id');
        // Lógica para mostrar toda la información de la fila
        // Aquí puedes cargar los datos de la fila y mostrarlos en un modal o de otra manera.
    });

    $('#tablaBienes').on('click', '.btnDelete', function () {
        var codigo_bien = $(this).data('codigo_bien');

        // Confirmar eliminación
        if (confirm('¿Estás seguro de eliminar este bien?')) {
            // Enviar solicitud de eliminación al servidor
            $.ajax({
                url: urlEliminarBien,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    codigo_bien: codigo_bien
                },
                success: function (response) {
                    tablaBienes.ajax.reload();
                    alert(response.message); // Mostrar mensaje de éxito
                },
                error: function (xhr) {
                    alert('Error al eliminar el bien.');
                    console.error(xhr);
                }
            });
        }
    });
    // Evento para limpiar el contenido del modal cuando se oculta
    $('#modalQR').on('hidden.bs.modal', function () {
        $('#modalQRId').text('');
        $('#modalQRCodigoBien').text('');
        $('#modalQRCode').html('');
    });


    // Evento para cerrar el modal de QR
    document.addEventListener('close-modal', event => {
        $('#modalQR').modal('hide');
    });



});

