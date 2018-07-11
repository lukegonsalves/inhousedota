<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Match;
use App\User;
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

    public function test(Request $request){

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);    

        $randomName = array_random(config('inhouse.match.names'));
        $randomAdjective = array_random(config('inhouse.match.adjectives'));
        $randomVerb = array_random(config('inhouse.match.verbs'));
        $hour = $request->get('hours');
        $minutes = $request->get('minutes');
        $time = $hour.':'.$minutes;
        $user = Auth::user();
        $dire = collect($request->get('dire'))->pluck('id64');
        $radiant = collect($request->get('radiant'))->pluck('id64');

        $match = Match::create([
            'match_name' => $request->get('name'),
            'lobby_password' => "{$randomName}{$randomVerb}{$randomAdjective}",
            'start_time' => $time,
            'creator' => $user->id64,

            'dire'=> json_encode($dire->toArray()), 
            'radiant'=> json_encode($radiant->toArray())
        ]); 
        
        return redirect('matches')->with('success', 'Information has been added');
    }

    public function index()
    {
        $matches=Match::all();
        $user = User::all();

        //return view('matches',compact('matches'));
        //return view('matches', ['match' => $matches, 'user' => $user]);
        //return view('matches')->compact($matches, $user);
        $data = array('matches' => Match::all(), 'users' => User::all());
        dd($data);
        return view('matches')->with($data);  
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
