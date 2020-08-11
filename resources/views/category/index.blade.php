 @extends('template')

 @section('main')
     <div id="category">
         <h2>Category</h2>

         @include('_partial.flash_message')

         @if (count($category_list) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach($category_list as $category): ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->nama_category }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('category/' . $category->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else
            <p>Tidak ada data Category Makanan.</p>
        @endif

        <div class="tombol-nav">
            <a href="category/create" class="btn btn-primary">Tambah Category</a>
        </div>

    </div> <!-- / #kelas -->
@stop

@section('footer')
   @include('footer')
@stop