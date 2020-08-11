@if (isset($category))
    {!! Form::hidden('id', $category->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_category') ? 'has-error' : 'has-success' }}">
@else
     <div class="form-group">
@endif
    {!! Form::label('nama_category', 'Nama Category:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_category', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_category'))
        <span class="help-block">{{ $errors->first('nama_category') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>