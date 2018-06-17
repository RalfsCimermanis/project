<?php

namespace App\Http\Controllers;

use App\Result;
use App\Team;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $results = Result::all();
        return view('results.index')->with('results', $results)->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('results.create')->with('teams', $teams);
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
            'date' => 'date_format:Y-m-d',
            'result_1' => 'required|integer',
            'result_2' => 'required|integer',
        ]);
        $result = new Result;
        $result->team_id_1 = $request->input('team_id_1');
        $result->team_id_2 = $request->input('team_id_2');
        $result->date = $request->input('date');
        $result->user_id = auth()->user()->id;
        $result->result_1 = $request->input('result_1');
        $result->result_2 = $request->input('result_2');
        $result->save();
        return redirect('/results')->with('success', 'Spēle pievienota');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::all();
        $result = Result::find($id);
        //check for correct user
        if((auth()->user()->id !==$result->user_id) and (auth()->user()->role !== 'Admin')) {
            return redirect('/results')->with('error', 'neautorizēta pieeja');
        }
        return view('results.edit')->with('result', $result)->with('teams', $teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'result_1' => 'required|integer',
            'result_2' => 'required|integer',
        ]);

        $result = Result::find($id);
        $result->result_1 = $request->input('result_1');
        $result->result_2 = $request->input('result_2');
        $result->save();

        return redirect('/results')->with('success', 'Informācija tika izlabota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::find($id);
        //check for correct user
        if((auth()->user()->id !==$result->user_id) and (auth()->user()->role !== 'Admin')) {
            return redirect('/results')->with('error', 'neautorizēta pieeja');
        }

        $result->delete();
        return redirect('/results')->with('success', 'Rezultāts noņemts');
    }
}
