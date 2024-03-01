<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;
use App\Models\User;


class EventController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $events = Event::all();

        return view('pages.event', compact('events', 'user_id'));
    }
    public function edit($id)
    {
        $event = Event::find($id);
        $tags = Tag::all();

        return view('pages.edit', compact('event', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $data = $request->all();

        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->event_date = $data['event_date'];

        $event->save();
        $event->tags()->sync($data['tag_id']);
        return redirect()->route('pages.edit', $event->id);
    }

    public function create($id)
    {
        $user_id = User::find($id);
        $events = Event::all();
        $tags = Tag::all(); // Recupera tutti i tag disponibili


        return view('pages.create',compact('events', 'tags','user_id'));
    }

    public function store(Request $request, $id)
    {

        $data = $request->all();


        $event = new Event();
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->event_date = $data['event_date'];
        $user = User::find($id);
        $user->events()->save($event);
        

        $event->tags()->attach($data['tag_id']);
        



        return redirect()->route('event.index');
    }
    public function destroy($id)
    {
        $event = Event::find($id);

        $event->tags()->detach();
        $event->delete();

        return redirect()->route('event.index');
    }


}


