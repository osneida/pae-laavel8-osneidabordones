<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
{{-- TODO <x- componentes de Blade --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h1> Laravel 8 - Osneida Bordones </h1>
                   <h3>  Si es administrador ingrese a la opción Administrar</h3>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
