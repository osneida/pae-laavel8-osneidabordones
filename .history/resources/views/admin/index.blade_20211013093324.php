
@extends('adminlte::page')

 <!-- @ extends('pluggins.Select2',true) para activar un plugin luego llamar el js para usarlo, para activarlo para todas las plantilas se coloca en true en la pagina adminlte.php -->

<!-- puedo instalar todos los pluggins local y luego cambiar en 
adminlte asset por true y cambio e location estan en vendor/nombre/..js 
los plugggins que no este en la pagina los coloco para poderlos usar
-->
@section('title', 'Osneida')

@section('content_header')
    <h1>Titulo</h1>
@stop

@section('content')
    <p>Bienvenido</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop