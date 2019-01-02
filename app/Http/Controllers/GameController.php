<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        //Activates the middlware rolecheck on only fields create and show
        $this->middleware('RoleCheck')->only(['create', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieves all data and redirects to view
        $games = Game::all();
        return view('admin.games.game', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirect to view
        return view('admin.games.add_game');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the data
        $request->validate([
            'name' => 'required|string|max:20',
            'aop' => 'required|integer|max:20',
            'dor' => 'required|date|max:20',
            'time' => 'required|integer|max:20',
            'description' => 'required|max:200'
        ]);

        //Starts an new database interaction
        $games = new Game();

        //Inserts everthing in the database
        $games->create([
            'name' => $request['name'],
            'aop' => $request['aop'],
            'dor' => $request['dor'],
            'time' => $request['time'],
            'description' => $request['description']
        ]);

        //Redirects to games
        return redirect("/games");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //Returns to the view
        return view('admin.games.details_game', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //Returns to the view
        return view('admin.games.edit_game', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //Validates the requested data
        $request->validate([
            'name' => 'required|string|max:20',
            'aop' => 'required|integer|max:20',
            'dor' => 'required|date|max:20',
            'time' => 'required|integer|max:20',
            'description' => 'required|max:200'
        ]);

        //Starts an new database interaction
        $games = new Game();

        //Makes it possible to update data where id is $gameid
        $games->where('id', $game->id)
            ->update([
                'name' => $request['name'],
                'aop' => $request['aop'],
                'dor' => $request['dor'],
                'time' => $request['time'],
                'description' => $request['description']
            ]);

        //redirects to games
        return redirect("/games");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //Removes the game where id is gameid and deletes it
        $game->where('id', $game->id)
            ->delete();

        //redirect
        return redirect('/games');
    }
}
