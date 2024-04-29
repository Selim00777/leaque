<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'index'])->name('home');


Route::resource('/comments', CommentController::class);
Route::resource('/games', GameController::class);
Route::resource('/players', PlayerController::class);
Route::resource('/scores', ScoreController::class);
Route::resource('/team', TeamController::class);

