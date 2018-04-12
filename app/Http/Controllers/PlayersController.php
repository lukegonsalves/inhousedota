<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class PlayersController extends Controller
{
    //  
    public function index()
    {
        $users = User::all();
        return view('players')->withUsers($users);
    }
}
