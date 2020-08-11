@extends('template')

@section('main')
    <div id="obat">
        <h2>Tambah Obat</h2>

        {!! Form::open(['url' => 'obat/store', 'files' => true]) !!}
            @include('obat.form', ['submitButtonText' => 'Tambah Obat'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop