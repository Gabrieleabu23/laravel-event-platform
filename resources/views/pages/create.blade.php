@extends('layouts.app')



@section('content')
    <h1>Create New Event</h1>
    <form action="{{ route('event.store') }}" method="POST">

    @csrf
    @method("POST")

    <label for="name">Name Event</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <br>
    <label for="event_date">Data Evento</label>
    <input type="date" name="event_date" id="event_date">
    <br>
    <label for="tag_id">Tag</label>
    <select name="tag_id" id="tag_id">
        @foreach ($tags as $tag)
            <option value="{{ $tag -> id }}">
                {{ $tag -> name }}
            </option>
        @endforeach
    </select>
    
    <input type="submit" value="CREATE">

    </form>
    
@endsection