<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;  // For index and show methods
use Illuminate\Support\Facades\Auth;  // For authorization (optional)
use App\Http\Requests\StorePlayerRequest;  // Replace with your validation request class (optional)

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = Player::query();

        // Filter players based on search criteria (optional)
        if ($request->has('team_id')) {
            $players->where('team_id', $request->team_id);
        }

        if ($request->has('position')) {
            $players->where('position', $request->position);
        }

        // Optionally apply authorization checks
        if (Auth::check()) {
            // Implement logic to filter players based on user permissions
            // $players = $players->where(/* ... */);
        }

        $players = $players->paginate(10);  // Adjust pagination as needed

        return view('players.index', compact('players'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::with('team')->findOrFail($id);

        return view('players.show', compact('player'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlayerRequest $request  // Replace with your validation request class (optional)
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)  // Include validation if needed
    {
        // Implement logic to create a new player (consider validation)

        return redirect()->route('players.index')->with('success', 'Player created successfully!');
    }

    // ... Add other methods as needed (update, destroy, etc.)
}
