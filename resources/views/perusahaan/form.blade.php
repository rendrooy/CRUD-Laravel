@if (isset($perusahaan))
{!! Form::hidden('id', $perusahaan->id) !!}
@endif

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_perusahaan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif

{!! Form::label('nama_perusahaan', 'Nama Perusahaan:', ['class' => 'control-label']) !!}
{!! Form::text('nama_perusahaan', null, ['class' => 'form-control']) !!}

@if ($errors->has('nama_perusahaan'))
<span class="help-block">{{ $errors->first('nama_perusahaan') }}</span>
@endif
</div>

<div class="form-group">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>