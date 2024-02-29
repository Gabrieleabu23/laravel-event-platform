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
    public function edit($id){
        $event= Event :: find($id);
        
        return view('pages.edit', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $event= Event ::find($id);
        $data= $request -> all();
       
        $event -> name =$data['name'];
        $event -> description=$data['description'];
        $event -> event_date=$data['event_date'];

        $event -> save();

        return redirect() -> route('pages.edit', $event -> id);
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


