<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;  // For index and show methods
use Illuminate\Support\Facades\Auth;  // For authorization (optional)
use App\Http\Requests\StoreGameRequest;  // Replace with your validation request class (optional)

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filter games based on search criteria (optional)
        $games = Game::query();

        if ($request->has('date')) {
            $games->where('date', $request->date);
        }

        if ($request->has('sport_id')) {
            $games->where('sport_id', $request->sport_id);
        }

        // Optionally apply authorization checks (e.g., only show upcoming games)
        if (Auth::check()) {
            // Implement logic to filter games based on user permissions
            // $games = $games->where(/* ... */);
        }

        $games = $games->paginate(10);  // Adjust pagination as needed

        return view('games.index', compact('games'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::with('team1', 'team2', 'comments')->findOrFail($id);

        return view('games.show', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request  // Replace with your validation request class (optional)
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)  // Include validation if needed
    {
        // Implement logic to create a new game (consider validation)

        return redirect()->route('games.index')->with('success', 'Game created successfully!');
    }

    // ... Add other methods as needed (update, destroy, etc.)
}
