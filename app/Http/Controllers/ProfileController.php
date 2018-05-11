<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;

class ProfileController extends Controller
{
    //  
    public function show(User $user = null)
    {
        $user = $user ?? Auth::user();
        // dd($user->heroes);
        // dd(heroesData());
        // dd($user, $user->id32);
        return view('profile')->withUser($user);
    }
}