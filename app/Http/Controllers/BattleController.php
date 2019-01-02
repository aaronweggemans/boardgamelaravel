<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Game;
use App\User;
use function foo\func;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BattleController extends Controller
{
    /**
     * BattleController constructor.
     */
    public function __construct()
    {
        //Using the middleware rolecheck on only create and store
        $this->middleware('RoleCheck')->only(['create', 'store']);

        /**
         * This will redirect the user if not logged in
         * also has the checks to redirect if user has in role a value
         * see middleware rolecheck
         */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $battles = Battle::with('users', 'games')->get();

//        $game = DB::select('SELECT game_id, COUNT(game_id) AS `value_occurrence` FROM battles GROUP BY game_id ORDER BY `value_occurrence` DESC LIMIT 1;');

        return view('admin.battles.battle', compact('battles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retrieve all the data trough model
        $games = Game::all();
        $users = User::all();

        return view('admin.battles.add_battle', compact('games', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Combines the requested field users and score togehter in one array
        $user_scores = array_combine($request->get('users'), $request->get('score'));

        //Gives the array the requested data
        foreach ($user_scores as $key => $value) {
            $user_scores_new[] = [
                'user_id' => $key,
                'score' => $value
            ];
        }

        //Removes an NULL element in the array, for some unknown reason the application adds an array without data
        $user_scores_new = array_filter($user_scores_new, function ($key) {
            return !is_null($key['user_id']) && !is_null($key['score']);
        });

        //validates the requested field and adds this in the database
        foreach ($user_scores_new as $score) {
            Validator::make($score, Battle::$rules)->validate();
            $battle = new Battle();
            $battle->create([
                'game_id' => $request->get('gamename'),
                'user_id' => json_encode($score['user_id']),
                'score' => $score['score']
            ]);
        }

        //returns to battels
        return redirect('/battles');
    }
}
