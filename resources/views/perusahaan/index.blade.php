 @extends('template')

 @section('main')
     <div id="perusahaan">
         <h2>Perusahaan</h2>

         @include('_partial.flash_message')

         @if (count($perusahaan_list) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach($perusahaan_list as $perusahaan): ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('perusahaan/' . $perusahaan->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['PerusahaanController@destroy', $perusahaan->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else
            <p>Tidak ada data Perusahaan.</p>
        @endif

        <div class="tombol-nav">
            <a href="perusahaan/create" class="btn btn-primary">Tambah Perusahaan</a>
        </div>

    </div> <!-- / #hobi -->
@stop

@section('footer')
   @include('footer')
@stop