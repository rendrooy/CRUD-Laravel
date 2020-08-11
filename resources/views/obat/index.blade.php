 @extends('template')

 @section('main')
     <div id="obat">
         <h2>Toko Obat</h2>

         @include('_partial.flash_message')

         @include('obat.form_pencarian')

         @if (!empty($obat_list))
             <table class="table">
                 <thead>
                    <tr>
                        <th>Obat</th>
                        <th>Harga</th>
                        <th>Jenis Obat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obat_list as $obat)
                    <tr>
                        
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->harga }}</td>
                        <td>{{ $obat->jenis->nama_jenis }}</td>

                        
                        <td>
                            <div class="box-button">
                                {{ link_to('obat/' . $obat->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                            </div>

                            @if (Auth::check())
                            <div class="box-button">
                                {{ link_to('obat/' . $obat->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['ObatController@destroy', $obat->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Tidak ada data obat.</p>
            @endif

        <div class="table-nav">
             <div class="jumlah-data">
                 <strong> Jumlah Data Obat: {{ $jumlah_obat }} </strong>
             </div>
             <div class="paging">
                {{ $obat_list->links() }}
            </div>
        </div>

        @if (Auth::check())
        <div class="tombol-nav">
            <a href="{{ url('obat/create') }}" class="btn btn-primary">Tambah Obat</a>
        </div>
        @endif

    </div> <!-- / #siswa -->
@stop


@section('footer')
    @include('footer')
@stop
