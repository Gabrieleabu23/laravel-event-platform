@extends('layouts.app')
@section('content')
    <h1>Eventi</h1>
    <a href="{{ route('event.create')}}">CREATE</a>

<ul>
    @foreach( $events as $event )
    <li class="my-2">
        {{ $event -> name }}
            {{ $event-> description }}
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