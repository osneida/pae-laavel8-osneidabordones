@extends('adminlte::page')

 <!-- @ extends('pluggins.Select2',true) para activar un plugin luego llamar el js para usarlo, para activarlo para todas las plantilas se coloca en true en la pagina adminlte.php -->

<!-- puedo instalar todos los pluggins local y luego cambiar en 
adminlte asset por true y cambio e location estan en vendor/nombre/..js 
los plugggins que no este en la pagina los coloco para poderlos usar
-->
@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info')  }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model( $role, ['route' => ['admin.roles.update', $role->id ], 'method' => 'put'] ) !!}
            
            @include('admin.roles.partials.form')
           
            {!! Form::hidden('id', null) !!}
            {!! Form::submit('Modificar Rol o permisos', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop
