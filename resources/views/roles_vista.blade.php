<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Listado de Roles</h3>
                <!-- Aquí puedes agregar la lógica para mostrar los roles -->
                <p>Aquí puedes gestionar los roles de los usuarios.</p>
            </div>
        </div>
    </div>
</x-app-layout>
