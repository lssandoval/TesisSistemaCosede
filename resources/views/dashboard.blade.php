<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex">
                <!-- Primer Div -->
                <div class="w-1/2 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Subir Listado Bienes Actualizado (Maestro Bienes - ESBYE)</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Cargar UN archivo de Excel actualizado con el  Maestro Bienes - y el sistema ESBYE.</p>
                </div>

                <!-- Espacio para Iconos -->
                <div class="w-1/2 flex justify-end items-center px-6">
                    <!-- Aquí importaremos los iconos -->
                    <i class="fas fa-file-import fa-3x mb-3 text-white"></i> <!-- Cambiado a 'fas' para íconos sólidos, tamaño ajustado y color blanco -->
                </div>
            </div>

            <!-- Separador entre los dos divs -->
            <hr class="my-8 border-b-2 border-gray-300 dark:border-gray-700">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex">
                <!-- Segundo Div -->
                <div class="w-1/2 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Mostrar Listado Bienes</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Mostrar lista actualziada Bienes COSEDE</p>
                </div>

                <!-- Espacio para Iconos -->
                <div class="w-1/2 flex justify-end items-center px-6">
                    <i class="fa-regular fa-rectangle-list fa-3x mb-3 text-white"></i> <!-- Color blanco -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
