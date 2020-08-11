@extends('template')

@section('main')
<div id="perusahaan">
    <h2>Edit Perusahaan</h2>

    {!! Form::model($perusahaan, ['method' => 'PATCH', 'action' => ['PerusahaanController@update', $perusahaan->id]]) !!}
    @include('perusahaan.form', ['submitButtonText' => 'Update Perusahaan'])
    {!! Form::close() !!}
</div>
@stop

@section('footer')
    @include('footer')
@stop