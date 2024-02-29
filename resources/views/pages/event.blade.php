@extends('layouts.app')
@section('content')

    <ul>
        @foreach( $events as $event )
        <li>
            {{ $event -> name }}
        </li>
        @endforeach
    </ul>


@endsection