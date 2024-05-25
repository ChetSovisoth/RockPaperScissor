<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/homegame', [GameController::class, 'index'])->name('homegame');
Route::post('/play', [GameController::class, 'play'])->name('play');