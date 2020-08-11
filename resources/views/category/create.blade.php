@extends('template')

@section('main')
    <div id="category">
        <h2>Tambah Category</h2>

        {!! Form::open(['url' => 'category']) !!}
            @include('category.form', ['submitButtonText' => 'Tambah Category'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop