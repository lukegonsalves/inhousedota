<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $brackets = User::all()->sortByDesc('rank')->groupBy('bracket');

        // return view('players')->withRanks($brackets);
        return view('players')->withPlayers(User::all());
    }
    

}
