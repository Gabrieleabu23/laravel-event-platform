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
}
