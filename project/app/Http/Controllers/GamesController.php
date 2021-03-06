<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $teams = Team::all();
            $games = Game::all();
            return view('games.index')->with('games', $games)->with('teams', $teams);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
        $teams = Team::all();
        return view('games.create')->with('teams', $teams);
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'date_format:Y-m-d'
        ]);
        $game = new Game;
        $game->team_id_1 = $request->input('team_id_1');
        $game->team_id_2 = $request->input('team_id_2');
        $game->date = $request->input('date');
        $game->user_id = auth()->user()->id;
        $game->save();
        return redirect('/games')->with('success', 'Spēle pievienota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        //check for correct user
        if((auth()->user()->id !==$game->user_id) and (auth()->user()->role !== 'Admin')) {
            return redirect('/games')->with('error', 'neautorizēta pieeja');
        }

        $game->delete();
        return redirect('/games')->with('success', 'Spēle noņemta');
    }
}
