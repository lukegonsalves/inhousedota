<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $steam_json = '{"communityvisibilitystate":3,"profilestate":1,"personaname":"Pancake Beta","lastlogoff":1526032317,"profileurl":"https:\/\/steamcommunity.com\/id\/DavidPiesse\/","avatar":"https:\/\/steamcdn-a.akamaihd.net\/steamcommunity\/public\/images\/avatars\/4c\/4c1ac7e1735bd458eaec89be92f781ffe06bbaae.jpg","avatarmedium":"https:\/\/steamcdn-a.akamaihd.net\/steamcommunity\/public\/images\/avatars\/4c\/4c1ac7e1735bd458eaec89be92f781ffe06bbaae_medium.jpg","avatarfull":"https:\/\/steamcdn-a.akamaihd.net\/steamcommunity\/public\/images\/avatars\/4c\/4c1ac7e1735bd458eaec89be92f781ffe06bbaae_full.jpg","personastate":0,"realname":"David Piesse","primaryclanid":"103582791429521408","timecreated":1364497546,"personastateflags":0,"steamID64":"76561198087557669"}';
        $steam_info = (array) json_decode($steam_json);

        User::createFromSteamUser(array_merge($steam_info, [
            'personaname' => 'Pyrion Flax',
            'steamID64' => 76561197969598639,
        ])); 

        User::createFromSteamUser(array_merge($steam_info, [
            'personaname' => 'luke_',
            'steamID64' => 76561198073474772,
        ])); 

        User::createFromSteamUser(array_merge($steam_info, [
            'personaname' => 'Pancake Beta',
            'steamID64' => 76561198087557669,
        ])); 

        for ($i=0; $i < 20; $i++) { 
            User::createFromSteamUser(array_merge($steam_info, [
                'personaname' => $faker->word(),
                'steamID64' => 76561197969598639,
            ])); 
        }

    }
}
