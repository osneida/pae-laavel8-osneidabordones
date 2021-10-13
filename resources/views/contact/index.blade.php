<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario de Contacto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route("contact.send") }}" method="POST">
                    @csrf
                    <div class="block" mt-4>
                        <x-form-input name="subject" label="Escribe el asunto de tu mensaje" />
                    </div>
                    <div class="block" mt-4>
                        <x-form-textarea name="message" label="Escribe tu mensaje" placeholder="Escribe tu mensaje" />
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-form-submit> Enviar Mensaje </x-form-submit>
                    </div>
                    
                </form>
                <small> (para usar <b>las opciones de correo</b>, debes configurar el correo en env)</small>
            </div>
        </div>
    </div>
</x-app-layout>    