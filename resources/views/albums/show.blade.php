@extends('layouts.app')

@section('content')
    <h1>{{ $album->name }}</h1>

    <a class="btn btn-secondary" href="/">Go back</a>
    <a class="btn btn-primary" href="/photos/create/{{$album->id}}">Upload photo</a>
    <hr>

    @if(count($album->photo) > 0)
        <?php
        $colcount = count($album->photo);
        $i = 1;
        ?>
        <div id="photos">
            <div class="row text-center">
                @foreach($album->photo as $photo)
                    @if($i == $colcount)
                        <div class="col-md-4 align-content-end">
                            <a href="/photos/{{$photo->id}}">
                                <img class="shadow p-1 mb-5 bg-white rounded" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" height="300px" width="100%">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                    @else
                        <div class="col-md-4 align-content-end">
                            <a href="/photos/{{$photo->id}}">
                                <img class="shadow p-1 mb-5 bg-white rounded" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" height="300px" width="100%">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                    @endif
                    @if($i % 3 == 0)
                        <div></div><div class="row text-center">
                    @else
                        </div>
                    @endif
                        <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No albums to display</p>
    @endif
@endsection
