@extends('layouts.app')
@section('content')

<ul>
    @foreach( $events as $event )
    <li class="my-2">
        {{ $event -> name }}
        <br>
        tag:
        @foreach ($event -> tags as $tag)
        {{$tag -> name}}
        <br>
        Id Tag:{{$tag -> id}}
        <br>
        @endforeach
    </li>
    <h2><a href="{{route('pages.edit',$event->id)}}">EDIT</a></h2>
        @endforeach
    </ul>


@endsection