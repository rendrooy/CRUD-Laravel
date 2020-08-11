@extends('template')

@section('main')
    <div id="category">
    <h2>Edit Category</h2>

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoryController@update', $category->id]]) !!}
        @include('category.form', ['submitButtonText' => 'Update Category'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop