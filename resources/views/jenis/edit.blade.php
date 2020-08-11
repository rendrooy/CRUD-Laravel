@extends('template')

@section('main')
    <div id="jenis">
    <h2>Edit Jenis</h2>

    {!! Form::model($jenis, ['method' => 'PATCH', 'action' => ['JenisController@update', $jenis->id]]) !!}
        @include('jenis.form', ['submitButtonText' => 'Update Jenis'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop