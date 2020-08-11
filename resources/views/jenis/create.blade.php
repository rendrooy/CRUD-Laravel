@extends('template')

@section('main')
    <div id="jenis">
        <h2>Tambah Jenis</h2>

        {!! Form::open(['url' => 'jenis']) !!}
            @include('jenis.form', ['submitButtonText' => 'Tambah Jenis'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop