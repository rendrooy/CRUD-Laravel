@if (isset($obat))
    {!! Form::hidden('id', $obat->id) !!}
@endif


<!-- NAMA -->
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_obat') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('nama_obat', 'Nama:', ['class' => 'control-label']) !!}
     {!! Form::text('nama_obat', null, ['class' => 'form-control']) !!}
     @if ($errors->has('nama_obat'))
        <span class="help-block">{{ $errors->first('nama_obat') }}</span>
     @endif
</div>

<!-- Harga -->
@if ($errors->any())
<div class="form-group {{ $errors->has('harga') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('harga', 'HARGA:', ['class' => 'control-label']) !!}
     {!! Form::text('harga', null, ['class' => 'form-control']) !!}
     @if ($errors->has('harga'))
        <span class="help-block">{{ $errors->first('harga') }}</span>
     @endif
</div>

<!-- TANGGAL LAHIR -->
<!-- @if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
    @if ($errors->has('tanggal_lahir'))
        <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
    @endif
</div> -->


<!-- Jenis -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('id_jenis') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('id_jenis', 'Jenis:', ['class' => 'control-label']) !!}
    @if(count($list_jenis) > 0)
        {!! Form::select('id_jenis', $list_jenis, null, ['class' => 'form-control', 'id' => 'id_jenis', 'placeholder' => 'Pilih Jenis']) !!}
     @else
       <p>Tidak ada pilihan Jenis, ayo bikin!</p>
   @endif
   @if ($errors->has('id_jenis'))
       <span class="help-block">{{ $errors->first('id_jenis') }}</span>
   @endif
</div>


<!-- JENIS KELAMIN -->
<!-- @if ($errors->any())
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
    </div>
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
     @endif
</div> -->


<!-- TELEPON -->
<!-- @if ($errors->any())
<div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('nomor_telepon', 'Telepon:', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nomor_telepon'))
    <span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
    @endif
</div> -->


<!-- Perusaha -->
@if ($errors->any())
<div class="form-group {{ $errors->has('perusahaan_obat') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
{!! Form::label('perusahaan_obat', 'Pilih 1 Perusahaan:', ['class' => 'control-label']) !!}
@if(count($list_perusahaan) > 0)
    @foreach($list_perusahaan as $key => $value)
        <div class="checkbox">
            <label>{!! Form::checkbox('perusahaan_obat[]', $key, null) !!} {{ $value }}</label>
        </div>
    @endforeach
@else
    <p>Tidak ada pilihan perusahaan, ayo bikin!</p>
@endif
</div>


<!-- FOTO -->
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
    @if ($errors->has('foto'))
        <span class="help-block">{{ $errors->first('foto') }}</span>
    @endif

    <!-- MENAMPILKAN FOTO -->
    @if (isset($obat))
        @if (isset($obat->foto))
            <img src="{{ asset('fotoupload/' . $obat->foto) }}">
        @else
            <!-- @if ($obat->jenis == 'Makanan Traditional')
                <img src="{{ asset('fotoupload/bakso.jpg') }}">
            @else
                <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
            @endif -->
        @endif
    @endif
</div>

<!-- SUBMIT -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>