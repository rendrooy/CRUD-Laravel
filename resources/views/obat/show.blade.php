 @extends('template')

 @section('main')
     <div id="obat">
         <h2>Detail Obat</h2>

         <table class="table table-striped">
            <tr>
                <th>Nama Obat</th>
                <td>{{ $obat->nama_obat }}</td>
            </tr>
             <tr>
                 <th>Harga</th>
                <td>{{ $obat->harga }}</td>
            </tr>
            <tr>
                <th>Jenis Obat</th>
                <td>{{ $obat->jenis->nama_jenis }}</td>
            </tr>
           
            <tr>
                <th>Perusahaan</th>
                <td>
                @foreach($obat->perusahaan as $item)
                <strong><span>{{ $item->nama_perusahaan }}</span></strong>,
                @endforeach
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if (isset($obat->foto))
                        <img src="{{ asset('fotoupload/' . $obat->foto) }}">
                    @else
                        <!-- @if ($obat->jenis_kelamin == 'L')
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}"> -->
                      <!--   @endif --> 
                    @endif
                </td>
            </tr>
        </table>
    </div>
@stop

@section('footer')
    @include('footer')
@stop