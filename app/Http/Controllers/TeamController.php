<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;  // For index, show, and potentially store methods
use Illuminate\Support\Facades\Auth;  // For authorization (optional)
use App\Http\Requests\StoreTeamRequest;  // Replace with your validation request class (optional)

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::query();

        // Filter teams based on search criteria (optional)
        if ($request->has('league_id')) {
            $teams->where('league_id', $request->league_id);
        }

        // Optionally apply authorization checks
        if (Auth::check()) {
            // Implement logic to filter teams based on user permissions
            // $teams = $teams->where(/* ... */);
        }

        $teams = $teams->paginate(10);  // Adjust pagination as needed

        return view('teams.index', compact('teams'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::with('league', 'players', 'games1.team2', 'games2.team1')->findOrFail($id);

        return view('teams.show', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTeamRequest $request  // Replace with your validation request class (optional)
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)  // Include validation if needed
    {
        // Implement logic to create a new team (consider validation)

        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    // ... Add other methods as needed (update, destroy, etc.)
}
