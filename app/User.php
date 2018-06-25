<?php

namespace App;

use Zttp\Zttp;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id64';

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'steam' => 'array',
        'open_dota' => 'array',
        'heroes' => 'array',
        'isAdmin' => 'boolean',
    ];

    protected $appends = [
        'rank',
        'rankName',
        'rankTier',
        'bracket',
        'smallAvatarUrl',
        'mmr',
        'profile_url',
        'is_admin'
    ];

    public function scopeRanked($query){
        return $query->orderBy('open_dota->rank_tier');
    }

    public function getId32Attribute(){
        return (string)(substr($this->id64, 3) - 61197960265728);
    }

    public function getIsAdminAttribute(){
        return in_array($this->id32, config('inhouse.admins'));
    }

    public function getProfileUrlAttribute(){
        return route('profile.user', $this);
    }

    public function getHasOpenDotaDataAttribute(){
        return !is_null($this->open_dota);
    }

    public function getSmallAvatarUrlAttribute(){
        return $this->steam['avatar'];
    }

    public function getAvatarUrlAttribute(){
        return $this->steam['avatarfull'];
    }

    public function getHeroesPlayedAttribute(){
        return collect($this->heroes)->reject(function($hero){
            return $hero['games'] < 1;
        });
    }

    public function getMmrAttribute(){
        if($this->hasOpenDotaData){ 
            if(!is_null($this->rank)){
                return 170 * ( ( $this->rankTierNumber * 4) + $this->rankSubTier );
            }
            else{
                if(array_key_exists('estimate',$this->open_dota['mmr_estimate'])){
                    return $this->open_dota['mmr_estimate']['estimate'];
                }
            }
        }
        
        return 0;
    }

    //gets raw rank number ie. 24
    public function getRankAttribute(){
        if($this->hasOpenDotaData){
            return $this->open_dota['rank_tier'];
        }

        return 0;
    }

    //gets the tier number ONLY ie. 2 from 24
    public function getRankTierNumberAttribute(){
        return floor( $this->open_dota['rank_tier'] / 10);
    }

    //uses rank tier > converts to name and adds the sub tier ah okay didnt dd this, reckon this is wrong    
    public function getRankTierAttribute(){
        return rankName($this->rankTierNumber) . ' ' . $this->rankSubTier;
    }

    //gets the subtier only    
    public function getRankSubTierAttribute(){
        return  $this->open_dota['rank_tier'] % 10;
    }

    //is this ever used?
    public function getRankNameAttribute(){
        if($this->hasOpenDotaData){
            return rankName( (string) (int) $this->rankTierNumber);
        }

        return rankName(null);
    }

    public function getBracketAttribute(){
        $splits = config('inhouse.brackets');

        $rank = $this->open_dota['rank_tier'];

        if($rank >= $splits[4]){
            return 5;
        }elseif($rank >= $splits[3]){
            return 4;
        }elseif($rank >= $splits[2]){
            return 3;
        }elseif($rank >= $splits[1]){
            return 2;
        }elseif($rank >= $splits[0]){
            return 1;
        }else{
            return 0;
        }
    }

    //update a users stats from Open Dota
    public function updateStats(){
        $this->updateOpenDotaPlayerData();

        $this->updateOpenDotaHeroesData();
    }

    public static function createFromSteamUser($steam_user){

        $user = User::create([
            'id64' => $steam_user['steamID64'],
            'username' => $steam_user['personaname'],
            'last_login' => Carbon::now(),
            'steam' => $steam_user
        ]);

        $user->updateOpenDotaPlayerData();

        $user->updateOpenDotaHeroesData();

        return $user;
    }

    public function updateOpenDotaPlayerData(){
        $player_data = Zttp::get('https://api.opendota.com/api/players/'.$this->id32)->json();
        
        return $this->update([
            'open_dota' => $player_data
        ]);
    }

    public function updateOpenDotaHeroesData(){
        $heroes_data = Zttp::get('https://api.opendota.com/api/players/'.$this->id32.'/heroes')->json();

        return $this->update([
            'heroes' => $heroes_data
        ]);
    }
}
