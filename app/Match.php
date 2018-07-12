<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Match extends Authenticable
{

    protected $guarded = [];
    
    protected $casts = [
        'dire' => 'array',
        'radiant' => 'array',
    ];

    protected $appends = [
        'direIds',
        'radiantIds',
        'direTeam',
        'direTeamNames',
        'radiantTeam'
    ];

    public function getDireIdsAttribute(){
        //dd(json_decode($this->dire));
        return json_decode($this->dire);
    }

    public function getRadiantIdsAttribute(){
        return json_decode($this->radiant);
    }

    public function getDireTeamNamesAttribute(){
        return collect($this->direIds)->map(function($id){
            return User::find(strval($id));
        });
    }

    public function getDireTeamAttribute(){
        //dd(collect(json_decode($this->dire)));
        return collect(json_decode($this->dire))->map(function($id){
            dd(User::find(strval($id))->username);
            return User::find(strval($id))->username;
        });
    }

    public function getRadiantTeamAttribute(){
        return collect($this->radiantIds)->map(function($id){
            return User::find($id);
        });
    }

    public function getAllPlayersAttribute(){
        return $this->direTeam->merge($this->radiantTeam);
    }
}
