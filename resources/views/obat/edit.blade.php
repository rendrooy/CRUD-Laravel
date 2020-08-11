@extends('template')

@section('main')
    <div id="obat">
        <h2>Edit Obat</h2>

        {!! Form::model($obat, ['method' => 'PATCH', 'files' => true, 'action' => ['ObatController@update', $obat->id]]) !!}
            @include('obat.form', ['submitButtonText' => 'Update Obat'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop