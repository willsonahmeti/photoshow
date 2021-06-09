@extends('layouts.app')

@section('content')
    <h3>Upload Photo</h3>

    {{ Form::open(['action' => ['App\Http\Controllers\PhotosController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    {{ Form::bsText('title', '', ['placeholder' => 'Photo title']) }}
    {{ Form::bsTextArea('description', '', ['placeholder' => 'Photo description']) }}
    {{ Form::hidden('album_id', $album_id) }}
    {{ Form::file('photo') }}
    {{ Form::bsSubmit('Upload', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
