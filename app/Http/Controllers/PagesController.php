<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Battle;

class PagesController extends Controller
{
    public function index()
    {
        //Retrieve data battles
        $battles = Battle::with(['users', 'games'])->orderBy('score', 'desc')->get();

        //Retrieve all games
        $games = Game::all();

        //Redirect
        return view('index', compact('battles', 'games'));
    }

    public function users()
    {
        //Retrieve data user and paginates it 'makes an possibilty to see multiple pages on view'
        $users = User::paginate(5);

        //redirect
        return view('admin.users', compact('users'));
    }

    public function auth()
    {
        //redirect to auth view!
        return view('auth');
    }

    public function account_details()
    {
        //retrieves data user
        $user = Auth::user();

        //redirect
        return view('auth.account_details', compact('user'));
    }

    /************************AJAX CALLS!***************************/
    /**
     * @param Request $request
     * @param $id
     * @return Game[]|\Illuminate\Database\Eloquent\Collection
     */
    public function retrieve_games(Request $request, $id)
    {
        //Gets all game where id gets the requested id
        $arr = Game::all()->where('id', $id);

        //and returns it
        return $arr;
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function retrieve_users()
    {
        //retrieves all users data
        $arr = User::all();

        //returns it
        return $arr;
    }
}