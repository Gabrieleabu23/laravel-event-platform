<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;







class EventController extends Controller
{
    public function index(){
        
        $events = Event :: all();

        return view('pages.event', compact('events'));
    }

    public function create() {

        $events = Event :: all();
        $tags = Tag::all(); // Recupera tutti i tag disponibili
        

        return view('pages.event' , compact ('events', 'tags'));
    }

    public function store(Request $request) {

        $data = $request ->all();
        
        $tag = Tag :: find($data['tag_id']);

        $event = new Event();
        $event -> name = $data['name'];
        $event -> description = $data['description'];

        $event -> tag() -> associate($tag);

        $event -> save();

        

        return redirect() -> route('event.index');
    }
}


