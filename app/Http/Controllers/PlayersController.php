<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class PlayersController extends Controller
{
    public function index()
    {
        $brackets = User::all()->sortByDesc('rank')->groupBy('bracket');

        return view('players')->withRanks($brackets);
    }
}
