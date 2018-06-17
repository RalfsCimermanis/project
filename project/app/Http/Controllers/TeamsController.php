<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;
class TeamsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'team_name' => 'required',
            'info' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //file upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        $team = new Team;
        $team->team_name = $request->input('team_name');
        $team->info = $request->input('info');
        $team->user_id = auth()->user()->id;
        $team->cover_image = $fileNameToStore;
        $team->save();

        return redirect('/teams')->with('success', 'Komanda pievienota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $team = Team::find($id);
            //check for correct user
        if((auth()->user()->id !==$team->user_id) and (auth()->user()->role !== 'Admin')) {
            return redirect('/teams')->with('error', 'neautorizēta pieeja');
        }
        return view('teams.edit')->with('team', $team);
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
            'team_name' => 'required',
            'info' => 'required'
        ]);

        //file upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $team = Team::find($id);
        $team->team_name = $request->input('team_name');
        $team->info = $request->input('info');
        if($request->hasFile('cover_image')){
            $team->cover_image = $fileNameToStore;
        }
        $team->save();

        return redirect('/teams')->with('success', 'Informācija tika izlabota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        //check for correct user
        if((auth()->user()->id !==$team->user_id) and (auth()->user()->role !== 'Admin')) {
            return redirect('/teams')->with('error', 'neautorizēta pieeja');
        }

        if($team->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$team->cover_image);
        }

        $team->delete();
        return redirect('/teams')->with('success', 'Komanda noņemta');
    }
}
