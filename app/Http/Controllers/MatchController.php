<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;

class MatchController extends Controller
{
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
        $validatedData = $request->validate([
            'name' => 'required',
        ]);    
        $match= new Match();
        $match->match_name=$request->get('name');
        $match->save();
        
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