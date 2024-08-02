<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Bienvenid@') }}
        </h2>
    </x-slot>

    <div class="py-12 h-screen overflow-y-auto">
        @php
        // Obtener los permisos desde el archivo de configuración
        $rolesPermissions = config('services.permission.roles');
        $uploadBPermissions = config('services.permission.uploadB');
        $uploadCPermissions = config('services.permission.uploadC');
        @endphp

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Primera Sección -->
            @if ($persona && in_array($persona->per_unidad, $rolesPermissions))
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="flex items-center p-6">
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">Asignar Roles</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Asignar y gestionar roles para los usuarios del sistema.</p>
                    </div>
                    <div class="ml-6">
                        <a href="{{ route('roles') }}" class="nav-link" title="Ir a Roles">
                            <i class="fa-solid fa-users fa-3x text-gray-800"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Segunda Sección -->
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="flex items-center p-6">
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">Subir Listado Bienes Actualizado (Maestro Bienes - ESBYE)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Cargar UN archivo de Excel actualizado con el Maestro Bienes - y el sistema ESBYE.</p>
                    </div>
                    <div class="ml-6">
                        <a type="button" class="nav-link text-actualizar" title="Botón Subir Archivo" data-bs-toggle="modal" data-bs-target="#modalSubir">
                            <i class="fa-solid fa-file-upload fa-3x text-gray-800"></i>
                        </a>
                        @livewire('modales.modal-subir')
                    </div>
                </div>
            </div>

            <!-- Tercera Sección -->
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="flex items-center p-6">
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">Subir Listado Componentes Tecnológicos-CT</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Cargar UN archivo de Excel actualizado de los Componentes Tecnológicos.</p>
                    </div>
                    <div class="ml-6">
                        <a type="button" class="nav-link text-actualizar" title="Botón Subir Archivo" data-bs-toggle="modal" data-bs-target="#modalSubirComponentes">
                            <i class="fa-solid fa-microchip fa-3x text-gray-800"></i>
                        </a>
                        @livewire('modales.modal-subir-componentes')
                    </div>
                </div>
            </div>

            <!-- Separador entre los dos divs -->
            <hr class="my-8 border-b-2 border-gray-300 dark:border-gray-700">

            <!-- Cuarta Sección -->
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="flex items-center p-6">
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">Mostrar Listado Bienes</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Mostrar lista actualizada Bienes COSEDE</p>
                    </div>
                    <div class="ml-6">
                        <a href="{{ route('bienes') }}" class="nav-link" title="Ir a Bienes">
                            <i class="fa-regular fa-rectangle-list fa-3x text-gray-800"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quinta Sección -->
            <div class="bg-gray-400 shadow overflow-hidden shadow-xl sm:rounded-lg mb-8">
                <div class="flex items-center p-6">
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-1">Historial de Cargas</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Ver el historial de archivos cargados.</p>
                    </div>
                    <div class="ml-6">
                        <a href="{{ route('historial-carga') }}" class="nav-link" title="Ver Historial de Cargas">
                            <i class="fa-solid fa-history fa-3x text-gray-800"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
