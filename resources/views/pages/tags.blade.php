@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>TAGS</h1>
        <ul>
            @foreach ($tags as $tag)
                <li>
                    {{$tag->name}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
