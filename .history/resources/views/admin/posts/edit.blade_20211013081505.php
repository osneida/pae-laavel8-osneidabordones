@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')
@include('admin.posts.partials.form')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop