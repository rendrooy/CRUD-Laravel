<div id="pencarian">
{!! Form::open(['url' => 'obat/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
     <div class="row">
         <div class="col-md-2">
             {!! Form::select('id_jenis', $list_jenis, (! empty($id_jenis) ? $id_jenis : null), ['id' => 'id_jenis', 'class' => 'form-control', 'placeholder' => '-Kategori obat-']) !!}
         </div>

        <!--  <div class="col-md-2">
             {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], (! empty($jenis_kelamin) ? $jenis_kelamin : null), ['id' => 'jenis_kelamin', 'class' => 'form-control', 'placeholder' => '-Penulis-']) !!}
        </div>
 -->
        <div class="col-md-8">
            <div class="input-group">
            {!! Form:: text('kata_kunci', (! empty($kata_kunci)) ? $kata_kunci : null,['class' => 'form-control', 'placeholder' => 'Masukan Nama Obat']) !!}
            <span class="input-group-btn">
            {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
            </span>
            </div>
        </div>
    </div>
{!! Form::close() !!}
</div>