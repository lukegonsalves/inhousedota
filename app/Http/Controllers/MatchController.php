<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Match;
use Auth;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);    

        $randomName = array_random(config('inhouse.match.names'));
        $randomAdjective = array_random(config('inhouse.match.adjectives'));
        $randomVerb = array_random(config('inhouse.match.verbs'));
        $hour = $request->get('hours');
        $minutes = $request->get('minutes');
        $time = $hour.':'.$minutes;
        $user = Auth::user('username');
        $match = Match::create([
            'match_name' => $request->get('name'),
            'lobby_password' => "{$randomName}{$randomVerb}{$randomAdjective}",
            'start_time' => $time,
            'creator' => $user->username
        ]);
        
        return redirect('matches')->with('success', 'Information has been added');
    }

    public function index()
    {
        $matches=Match::all();
        return view('matches',compact('matches'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = match::find($id);
        $match->delete();
        return redirect('matches')->with('success','Information has been  deleted');
    }
    
}
