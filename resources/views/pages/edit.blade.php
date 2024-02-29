@extends('layouts.app')
@section('content')

<h1>
    Modifca Evento
</h1>

@auth
    
    <form action="{{ route('pages.update', $event->id) }}" method="POST">

        @csrf
        @method('PUT')
    
        <label for="name">Nome Evento</label>
        <input type="text" name="name" id="name" value="{{ $event->name }}">
        <br>
        <label for="description" class="d-block">Descrizione</label>
        <textarea name="description" id="description" >{{$event -> description}}</textarea>
        <br>
        <label for="event_date">Anno Pubblicazione</label>
        <input type="date" name="event_date" id="event_date"
            value="{{ $event->event_date }}">
        <br>
    
        <input type="submit" value="Aggiorna">
    </form>
@else
    
    <p>Effettua l'accesso per visualizzare questa sezione.</p>
@endauth

@endsection