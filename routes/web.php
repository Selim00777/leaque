<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $comments=\App\Models\Comment::all();
    return view('index',compact('comments'));
});
Route::get('/', function () {
    $games=\App\Models\Game::all();
    return view('index',compact('games'));
});
Route::get('/', function () {
    $players=\App\Models\Player::all();
    return view('index',compact('players'));
});
Route::get('/', function () {
    $scores=\App\Models\Score::all();
    return view('index',compact('scores'));
});
Route::get('/', function () {
    $teams=\App\Models\Team::all();
    return view('index',compact('teams'));
});
