@extends('adminlte::page')

@section('title', 'Listado de Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

