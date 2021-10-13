@extends('adminlte::page')

 <!-- @ extends('pluggins.Select2',true) para activar un plugin luego llamar el js para usarlo, para activarlo para todas las plantilas se coloca en true en la pagina adminlte.php -->

<!-- puedo instalar todos los pluggins local y luego cambiar en 
adminlte asset por true y cambio e location estan en vendor/nombre/..js 
los plugggins que no este en la pagina los coloco para poderlos usar
-->
@section('title', 'Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model( $category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put'] ) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre de la categoría']) !!}
                @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el slug de la categoría']) !!}
                @error('slug')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            {!! Form::hidden('id', null) !!}
            {!! Form::submit('Modificar categoría', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop
