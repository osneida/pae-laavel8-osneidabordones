@component('mail::message')
{{-- TODO, debe estar el texto alineado a la izquierda     --}}

# Hola Admin,

<p>  has recibido un mensaje desde el formulariod de contacto en {{  config('app.name') }}</p>

<p>
    Motivo del mensaje: {{ $textSubject }}
</p>

<p>
    {{ $textMessage }}
</p>

@endcomponent