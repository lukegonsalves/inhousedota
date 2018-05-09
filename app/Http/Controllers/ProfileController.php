<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class ProfileController extends Controller
{
    //  
    public function index()
    {
        return view('profile');
    }
}