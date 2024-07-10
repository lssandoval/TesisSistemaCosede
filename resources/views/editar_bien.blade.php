<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Editar Bien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Editar Bien</h3>
                
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('actualizar-bien', $bien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                        <!-- Columna 1 -->
                        <div>
                            <div class="mb-4">
                                <label for="codigo_bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código del Bien</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="codigo_bien" name="codigo_bien" value="{{ $bien->codigo_bien }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="codigo_anterior" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código Anterior</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="codigo_anterior" name="codigo_anterior" value="{{ $bien->codigo_anterior }}">
                            </div>
                            <div class="mb-4">
                                <label for="identificador" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Identificador</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="identificador" name="identificador" value="{{ $bien->identificador }}">
                            </div>
                            <div class="mb-4">
                                <label for="nro_acta_matriz" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nro Acta Matriz</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="nro_acta_matriz" name="nro_acta_matriz" value="{{ $bien->nro_acta_matriz }}">
                            </div>
                            <div class="mb-4">
                                <label for="bld_bca" class="block text-sm font-medium text-gray-700 dark:text-gray-300">BLD/BCA</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="bld_bca" name="bld_bca" value="{{ $bien->bld_bca }}">
                            </div>
                            <div class="mb-4">
                                <label for="bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bien</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="bien" name="bien" value="{{ $bien->bien }}">
                            </div>
                        </div>

                        <!-- Columna 2 -->
                        <div>
                            <div class="mb-4">
                                <label for="serie_identificacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Serie Identificación</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="serie_identificacion" name="serie_identificacion" value="{{ $bien->serie_identificacion }}">
                            </div>
                            <div class="mb-4">
                                <label for="modelo_caracteristicas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Modelo Características</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="modelo_caracteristicas" name="modelo_caracteristicas" value="{{ $bien->modelo_caracteristicas }}">
                            </div>
                            <div class="mb-4">
                                <label for="marca_otros" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Marca Otros</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="marca_otros" name="marca_otros" value="{{ $bien->marca_otros }}">
                            </div>
                            <div class="mb-4">
                                <label for="critico" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Crítico</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="critico" name="critico" value="{{ $bien->critico }}">
                            </div>
                            <div class="mb-4">
                                <label for="moneda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Moneda</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="moneda" name="moneda" value="{{ $bien->moneda }}">
                            </div>
                            <div class="mb-4">
                                <label for="valor_compra" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor Compra</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="valor_compra" name="valor_compra" value="{{ $bien->valor_compra }}">
                            </div>
                        </div>

                        <!-- Columna 3 -->
                        <div>
                            <div class="mb-4">
                                <label for="recompra" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Recompra</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="recompra" name="recompra" value="{{ $bien->recompra }}">
                            </div>
                            <div class="mb-4">
                                <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="color" name="color" value="{{ $bien->color }}">
                            </div>
                            <div class="mb-4">
                                <label for="material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Material</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="material" name="material" value="{{ $bien->material }}">
                            </div>
                            <div class="mb-4">
                                <label for="dimensiones" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dimensiones</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="dimensiones" name="dimensiones" value="{{ $bien->dimensiones }}">
                            </div>
                            <div class="mb-4">
                                <label for="condicion_bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Condición Bien</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="condicion_bien" name="condicion_bien" value="{{ $bien->condicion_bien }}">
                            </div>
                            <div class="mb-4">
                                <label for="habilitado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Habilitado</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="habilitado" name="habilitado" value="{{ $bien->habilitado }}">
                            </div>
                        </div>

                        <!-- Columna 4 -->
                        <div>
                            <div class="mb-4">
                                <label for="estado_bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado Bien</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="estado_bien" name="estado_bien" value="{{ $bien->estado_bien }}">
                            </div>
                            <div class="mb-4">
                                <label for="id_bodega" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Bodega</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="id_bodega" name="id_bodega" value="{{ $bien->id_bodega }}">
                            </div>
                            <div class="mb-4">
                                <label for="bodega" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bodega</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="bodega" name="bodega" value="{{ $bien->bodega }}">
                            </div>
                            <div class="mb-4">
                                <label for="id_ubicacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Ubicación</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="id_ubicacion" name="id_ubicacion" value="{{ $bien->id_ubicacion }}">
                            </div>
                            <div class="mb-4">
                                <label for="ubicacion_bodega" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación Bodega</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="ubicacion_bodega" name="ubicacion_bodega" value="{{ $bien->ubicacion_bodega }}">
                            </div>
                            <div class="mb-4">
                                <label for="nro_cedula_ruc" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nro Cédula/RUC</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="nro_cedula_ruc" name="nro_cedula_ruc" value="{{ $bien->nro_cedula_ruc }}">
                            </div>
                        </div>

                        <!-- Columna 5 -->
                        <div>
                            <div class="mb-4">
                                <label for="custodio_actual" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custodio Actual</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="custodio_actual" name="custodio_actual" value="{{ $bien->custodio_actual }}">
                            </div>
                            <div class="mb-4">
                                <label for="custodio_activo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Custodio Activo</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="custodio_activo" name="custodio_activo" value="{{ $bien->custodio_activo }}">
                            </div>
                            <div class="mb-4">
                                <label for="origen_ingreso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Origen Ingreso</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="origen_ingreso" name="origen_ingreso" value="{{ $bien->origen_ingreso }}">
                            </div>
                            <div class="mb-4">
                                <label for="tipo_ingreso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo Ingreso</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="tipo_ingreso" name="tipo_ingreso" value="{{ $bien->tipo_ingreso }}">
                            </div>
                            <div class="mb-4">
                                <label for="nro_compromiso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nro Compromiso</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="nro_compromiso" name="nro_compromiso" value="{{ $bien->nro_compromiso }}">
                            </div>
                            <div class="mb-4">
                                <label for="estado_acta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado Acta</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="estado_acta" name="estado_acta" value="{{ $bien->estado_acta }}">
                            </div>
                        </div>

                        <!-- Columna 6 -->
                        <div>
                            <div class="mb-4">
                                <label for="contabilizado_acta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contabilizado Acta</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="contabilizado_acta" name="contabilizado_acta" value="{{ $bien->contabilizado_acta }}">
                            </div>
                            <div class="mb-4">
                                <label for="contabilizado_bien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contabilizado Bien</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="contabilizado_bien" name="contabilizado_bien" value="{{ $bien->contabilizado_bien }}">
                            </div>
                            <div class="mb-4">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="descripcion" name="descripcion" value="{{ $bien->descripcion }}">
                            </div>
                            <div class="mb-4">
                                <label for="item_renglon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Item Renglón</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="item_renglon" name="item_renglon" value="{{ $bien->item_renglon }}">
                            </div>
                            <div class="mb-4">
                                <label for="cuenta_contable" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cuenta Contable</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="cuenta_contable" name="cuenta_contable" value="{{ $bien->cuenta_contable }}">
                            </div>
                            <div class="mb-4">
                                <label for="depreciable" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Depreciable</label>
                                <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="depreciable" name="depreciable" value="{{ $bien->depreciable }}">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                        <div class="mb-4">
                            <label for="fecha_creacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Creación</label>
                            <input type="datetime-local" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="fecha_creacion" name="fecha_creacion" value="{{ $bien->fecha_creacion }}">
                        </div>

                        <div class="mb-4">
                            <label for="fecha_ingreso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Ingreso</label>
                            <input type="datetime-local" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="fecha_ingreso" name="fecha_ingreso" value="{{ $bien->fecha_ingreso }}">
                        </div>

                        <div class="mb-4">
                            <label for="fecha_ultima_depreciacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Última Depreciación</label>
                            <input type="date" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="fecha_ultima_depreciacion" name="fecha_ultima_depreciacion" value="{{ $bien->fecha_ultima_depreciacion }}">
                        </div>

                        <div class="mb-4">
                            <label for="periodo_depreciacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Periodo Depreciación</label>
                            <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="periodo_depreciacion" name="periodo_depreciacion" value="{{ $bien->periodo_depreciacion }}">
                        </div>

                        <div class="mb-4">
                            <label for="cod_adicional" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código Adicional</label>
                            <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="cod_adicional" name="cod_adicional" value="{{ $bien->cod_adicional }}">
                        </div>

                        <div class="mb-4">
                            <label for="asignacion_bodega" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Asignación Bodega</label>
                            <input type="text" class="form-control mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="asignacion_bodega" name="asignacion_bodega" value="{{ $bien->asignacion_bodega }}">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('bienes.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
