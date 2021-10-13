@extends('adminlte::page')

@section('title', 'Listado de Posts')

@section('content_header')
<h1>Lista de Posts </h1>
@stop

@section('content')

    @livewire('admin.post-index')

@stop

