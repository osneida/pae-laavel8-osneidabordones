@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($post, (['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}
     
        {!! Form::hidden('user_id', auth()->user()->id) !!}
     
            @include('admin.posts.partials.form')

        {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>


@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>

@stop