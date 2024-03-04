<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

use Auth;

class ApiController extends Controller
{
    public function getEvent()
    {

        return response()->json([

            'status' => 'success',
            'message' => 'Testo di prova',
        ]);
    }
    public function VerifyCredit(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Recupera l'utente in base all'email
    $user = User::where('email', $credentials['email'])->first();

    // Verifica se l'utente esiste e la password è corretta
    if ($user && Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
        return response()->json(['message' => 'Autenticazione riuscita']);
    }

    return response()->json(['message' => 'Credenziali non valide'], 401);
}
    public function getEvents()
    {

        $events = Event::all();
        $users = User::all();

        return response()->json([
            'status' => 'success',
            'events' => $events,
            'users' => $users
        ]);
    }

}
