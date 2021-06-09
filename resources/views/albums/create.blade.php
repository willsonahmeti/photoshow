@extends('layouts.app')

@section('content')
    <h3>Create Album</h3>

    {{ Form::open(['action' => ['App\Http\Controllers\AlbumsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        {{ Form::bsText('name', '', ['placeholder' => 'Album name']) }}
        {{ Form::bsTextArea('description', '', ['placeholder' => 'Album description']) }}
        {{ Form::file('cover_image') }}
        {{ Form::bsSubmit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
