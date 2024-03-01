<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class ApiController extends Controller
{
    public function getEvent(){

        return response() -> json([
            
            'status' => 'success',
            'message' => 'Testo di prova',
        ]);
    }

    public function getEvents(){

        $events = Event :: all();
        $users = User :: all();

        return response()->json([
            'status' => 'success',
            'events' => $events,
            'users' => $users
        ]);
    }

}
