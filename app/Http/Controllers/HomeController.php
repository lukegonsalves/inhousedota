<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function updateIn(Request $request)
    {
        $user = $user ?? Auth::user();
        //dd($user);
        $statusUpdate = User::where('id64', $user->id64)
        ->update([
            'status' => 'yes'
        ]);
        if($statusUpdate){
            return view('home')->withUser($user); 
        }
    }

    public function updateOut(Request $request)
    {
        $user = $user ?? Auth::user();
        //dd($user);
        $statusUpdate = User::where('id64', $user->id64)
        ->update([
            'status' => 'no'
        ]);
        if($statusUpdate){
            return view('home')->withUser($user); 
        }
    }

    public function resetStatus(Request $request)
    {
        $user = $user ?? Auth::user();
        $statusUpdate = DB::table('users')
            ->update(['status' => 'no']);
        if($statusUpdate){
            return view('home')->withUser($user);
        }

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $user ?? Auth::user();
        return view('home')->withUser($user);
    }
}
