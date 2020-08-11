@extends('template')

@section('main')
    <div id="perusahaan">
    <h2>Tambah Perusahaan</h2>

    {!! Form::open(['url' => 'perusahaan']) !!}
    @include('perusahaan.form', ['submitButtonText' => 'Tambah Perusahaan'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop