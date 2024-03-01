<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('pages/event', [EventController::class, 'index'])
    ->name('event.index');

// ROTTA PER IL METODO CREATE/STORE
Route::get('/events/create/{id}', [EventController::class, 'create'])->name('event.create');
Route::post('/events/store/{id}', [EventController::class, 'store'])->name('event.store');

Route::delete('/events/{id}', [EventController::class, 'destroy'])
    ->name('event.destroy');


Route::get('/pages/event/edit/{id}', [EventController::class, 'edit'])->name('pages.edit');
Route::put('/pages/event/{id}', [EventController::class, 'update'])
    ->name('pages.update');
Route::delete('/{id}', [EventController::class, 'destroy'])
    ->name('event.destroy');
Route::get('/pages/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->group(function () {
//     Route::put('/pages/edit/{id}', 'TagController@update')->name('pages.update');
// });


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
