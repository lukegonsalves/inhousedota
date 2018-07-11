<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Match extends Model
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
        'radiantTeam'
    ];

    public function getDireIdsAttribute(){
        return json_decode($this->dire);
    }

    public function getRadiantIdsAttribute(){
        return json_decode($this->radiant);
    }

    public function getDireTeamAttribute(){
        return collect($this->direIds)->map(function($id){
            return User::find(strval($id));
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
