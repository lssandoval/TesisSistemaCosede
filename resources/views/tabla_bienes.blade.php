<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Tabla Bienes') }}
        </h2>
    </x-slot>

    <div class="container-fluid py-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div class="mb-3 flex justify-between items-center">
                        <!-- Botón Generar Códigos QR en Masa -->
                        <div class="mb-3">
                            <form action="{{ route('generar.qrs') }}" method="POST" wire:submit.prevent="showLoadingModal">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-qrcode text-yellow-500"></i> <!-- Icono QR amarillo -->
                                    Generar Códigos QR en Masa
                                </button>
                            </form>
                        </div>
                        <!-- Recuadro informativo (Tutorial) -->
                        <div class="mb-3 bg-gray-200 p-3 rounded">
                            <div class="text-center text-lg font-bold mb-2">
                                --IMPORTANTE--
                            </div>
                            <span class="text-sm ml-2">
                                <span class="tooltip-icon text-yellow-500"><i class="fa-solid fa-pen-to-square fa-lg"></i></span> Modificar: Permite editar la información del activo seleccionado.
                                <br>
                                <span class="tooltip-icon text-blue-500"><i class="fa-solid fa-qrcode fa-lg"></i></span> Generar QR: Permite generar un código QR para el activo seleccionado.
                                <br>
                                <span class="tooltip-icon text-red-500"><i class="fa-solid fa-trash fa-lg"></i></span> Eliminar: Permite eliminar el activo seleccionado.
                            </span>
                        </div>

                        <!-- Botón Generar Excel con QR -->
                        <div class="mb-3">
                            <a href="{{ route('generar.excel') }}" class="btn btn-success" wire:click.prevent="showLoadingModal">
                                <i class="fa-regular fa-file-excel"></i> <!-- Icono de Excel -->
                                Generar Excel con QR
                            </a>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('generar.pdf') }}" class="btn btn-danger" wire:click.prevent="showLoadingModal">
                                <i class="fa-solid fa-file-pdf"></i> <!-- Icono de PDF -->
                                Generar PDF
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="tablaBienes">
                        <thead>
                            <tr class="bg-gray-100">
                                <th scope="col" class="fixed-column">Información</th>
                                <th scope="col" class="fixed-column">Acciones</th>
                                <th scope="col">ID</th>
                                <th scope="col">Código Bien</th>
                                <th scope="col">Código Anterior</th>
                                <th scope="col">Identificador</th>
                                <th scope="col">Nro de Acta/Matriz</th>
                                <th scope="col">(BLD) o (BCA)</th>
                                <th scope="col">Bien</th>
                                <th scope="col">Serie/Identificación</th>
                                <th scope="col">Modelo/Características</th>
                                <th scope="col">Marca/Otros</th>
                                <th scope="col">Crítico</th>
                                <th scope="col">Moneda</th>
                                <th scope="col">Valor de Compra</th>
                                <th scope="col">Recompra</th>
                                <th scope="col">Color</th>
                                <th scope="col">Material</th>
                                <th scope="col">Dimensiones</th>
                                <th scope="col">Condición del Bien</th>
                                <th scope="col">Habilitado</th>
                                <th scope="col">Estado Bien</th>
                                <th scope="col">Id Bodega</th>
                                <th scope="col">Bodega</th>
                                <th scope="col">Id Ubicación</th>
                                <th scope="col">Ubicación de Bodega</th>
                                <th scope="col">Nro de Cédula/RUC</th>
                                <th scope="col">Custodio Actual</th>
                                <th scope="col">Custodio Activo</th>
                                <th scope="col">Origen del Ingreso</th>
                                <th scope="col">Tipo de Ingreso</th>
                                <th scope="col">Nro de Compromiso</th>
                                <th scope="col">Estado del Acta</th>
                                <th scope="col">Contabilizado del Acta</th>
                                <th scope="col">Contabilizado del Bien</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Item/Renglón</th>
                                <th scope="col">Cuenta Contable</th>
                                <th scope="col">Depreciable</th>
                                <th scope="col">Fecha de Creación</th>
                                <th scope="col">Fecha de Ingreso</th>
                                <th scope="col">Fecha Última Depreciación</th>
                                <th scope="col">Vida Útil</th>
                                <th scope="col">Fecha Término Depreciación</th>
                                <th scope="col">Valor Contable</th>
                                <th scope="col">Valor Residual</th>
                                <th scope="col">Valor en Libros</th>
                                <th scope="col">Valor Depreciación Acumulada</th>
                                <th scope="col">Comodato</th>
                                <th scope="col">Fecha Creación</th>
                                <th scope="col">Fecha Actualización</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @livewire('modales.modal-codigo-q-r')

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <!-- Variable JavaScript para la ruta -->
    <script>
        const routeBienes = "{{ route('datatable.bienes') }}";
    </script>
    <script>
        var generateQRUrl = "{{ route('generate-qrcode') }}";
    </script>
    <!-- Aquí asumo que tienes algo así en tu vista Blade -->
    <script>
        var urlEliminarBien = "{{ route('eliminar-bien') }}";
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.dispatch('mostrarModal');
            Livewire.dispatch('ocultarModal');
        })
    </script>

    <!-- Scripts personalizados -->
    <script src="{{ asset('js/components/modalEditarBien.js') }}"></script>
    <script src="{{ asset('js/components/modalQR.js') }}"></script>
    <script src="{{ asset('js/components/dataTables.js') }}"></script>
    @endpush
</x-app-layout>