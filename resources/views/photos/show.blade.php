@extends('layouts.app')

@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{ $photo->description }}</p>
    <a class="btn btn-secondary" href="/albums/{{$photo->album_id}}">Back to gallery</a>
    <hr>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
    <br><br>
    {{ Form::open(['action' => ['App\Http\Controllers\PhotosController@destroy', $photo->id], 'method' => 'POST']) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete Photo', ['class' => 'btn btn-danger']) }}
    {{ Form::close() }}
    <hr>
    <small>Size: {{ $photo->size }}</small>
@endsection
