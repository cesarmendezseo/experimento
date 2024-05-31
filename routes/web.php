<?php


use App\Livewire\Equipo\ListadoEquipo;
use App\Livewire\Estadistica;
use App\Livewire\Jugadores\Jugadores;
use App\Livewire\Plantilla\Plantilla;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/jugadores', Jugadores::class)->name('jugadores');
    Route::get('/equipos', ListadoEquipo::class)->name('equipos');
    Route::get('/plantilla', Plantilla::class)->name('plantilla');
    Route::get('/estadistica', Estadistica::class)->name('estadistica');
});
