@extends('layouts.app')

@section('content')

    @if(count($albums) > 0)
        <?php
            $colcount = count($albums);
            $i = 1;
        ?>
        <div id="albums">
            <div class="row text-center">
                @foreach($albums as $album)
                    @if($i == $colcount)
                        <div class="col-md-4 align-content-end">
                            <a href="/albums/{{$album->id}}">
                                <img class="shadow p-1 mb-5 bg-white rounded" src="storage/album_cover/{{$album->cover_image}}" alt="{{$album->name}}" height="300px" width="100%">
                            </a>
                            <br>
                            <h4>{{$album->name}}</h4>
                    @else
                        <div class="col-md-4">
                            <a href="/albums/{{$album->id}}">
                                <img class="shadow p-1 mb-5 bg-white rounded" src="storage/album_cover/{{$album->cover_image}}" alt="{{$album->name}}" height="300px" width="100%">
                            </a>
                            <br>
                            <h4>{{$album->name}}</h4>
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
