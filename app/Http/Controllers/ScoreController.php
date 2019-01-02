<?php

namespace App\Http\Controllers;

use App\Battle;

class ScoreController extends Controller
{
    /**
     * ScoreController constructor.
     */
    public function __construct()
    {
        //Creates the middleware
        $this->middleware('RoleCheck')->only(['create', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retrieves data with pagination
        $scores = Battle::with(['users', 'games'])->paginate(5);

        //Retrieves the highest players with score descending
        $highest = Battle::with(['users', 'games'])->orderBy('score', 'desc')->get();

        //Check if the player has an undifined offset
        if(empty($highest[0]->score)) {
            $highestValue = 0;
        } else {
            $highestValue = $highest[0]->score;
        }

        //Check if the player has an undifined offset
        if(empty($highest[1]->score)) {
            $secondValue = 0;
        } else {
            $secondValue = $highest[1]->score;
        }

        //Check if the player has an undifined offset
        if(empty($highest[2]->score)) {
            $thirdValue = 0;
        } else {
            $thirdValue = $highest[2]->score;
        }

        //Retrieves the data an rounds this number to even in percentage
        $two = round(($secondValue / $highestValue) * 100);
        $three = round(($thirdValue / $highestValue) * 100);

        //Returns the view
        return view('admin.scores.score', compact('scores', 'highest', 'two', 'three'));
    }
}
