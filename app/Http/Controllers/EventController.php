<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;







class EventController extends Controller
{
    public function index(){
        
        $events = Event :: all();

        return view('pages.event', compact('events'));
    }

    public function create() {

        $events = Event :: all();
        $tags = Tag::all(); // Recupera tutti i tag disponibili
        

        return view('pages.create' , compact ('events', 'tags'));
    }

    public function store(Request $request) {

        $data = $request ->all();
        

        $event = new Event();
        $event -> name = $data['name'];
        $event -> description = $data['description'];
        $event -> event_date = $data['event_date'];
        $event -> save();
        $event -> tags() -> attach($data['tag_id']);


        

        return redirect() -> route('event.index');
    }
}


