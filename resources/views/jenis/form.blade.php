@if (isset($jenis))
    {!! Form::hidden('id', $jenis->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_jenis') ? 'has-error' : 'has-success' }}">
@else
     <div class="form-group">
@endif
    {!! Form::label('nama_jenis', 'Nama Jenis:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_jenis', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_jenis'))
        <span class="help-block">{{ $errors->first('nama_jenis') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>