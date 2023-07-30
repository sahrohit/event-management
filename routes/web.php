<?php

use App\Http\Livewire\EditParticipant;
use App\Http\Livewire\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/participants', function () {
    return view('participants');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/edit', [EditParticipant::class, 'render']);

Route::get('/{id}', [EventController::class, 'render']);