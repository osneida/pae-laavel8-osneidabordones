@extends('adminlte::page')

@section('title', 'Listado de Roles')

@section('content_header')
    @can('admin.roles.create')
        <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary btn-sm float-right"> Agregar Rol</a>  
    @endcan
    <h1>Lista de Roles </h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info')  }}</strong>
    </div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol )
                <tr>
                    <td>{{ $rol["id"] }}</td>
                    <td>{{ $rol["name"] }}</td>
                    <td width="10px"> 
                        @can('admin.roles.edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $rol->id) }}">Editar</a>
                        @endcan
                    </td>
                    <td width="10px">
                        {{-- coloque edit porque no lo crree luego coloco destroy --}}
                        @can('admin.roles.edit')
                            <form action="{{ route('admin.roles.destroy', $rol->id ) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                            @endcan
                    </td>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
 

 
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop