<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // For authorization (optional)
use App\Http\Requests\StoreScoreRequest;  // Replace with your validation request class (optional)

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scores = Score::query();

        // Filter scores based on search criteria (optional)
        if ($request->has('game_id')) {
            $scores->where('game_id', $request->game_id);
        }

        if ($request->has('player_id')) {
            $scores->where('player_id', $request->player_id);
        }

        if ($request->has('team_id')) {
            $scores->where('team_id', $request->team_id);
        }

        // Optionally apply authorization checks (e.g., only show scores for specific games or teams)
        if (Auth::check()) {
            // Implement logic to filter scores based on user permissions
            // $scores = $scores->where(/* ... */);
        }

        $scores = $scores->paginate(10);  // Adjust pagination as needed

        return view('scores.index', compact('scores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreScoreRequest $request  // Replace with your validation request class (optional)
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreRequest $request)  // Include validation if needed
    {
        // Implement logic to create a new score (consider validation)

        return redirect()->route('scores.index')->with('success', 'Score created successfully!');
    }

    // ... Add other methods as needed (show, update, destroy, etc.)
}
