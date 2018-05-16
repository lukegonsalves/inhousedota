<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id64' => '76561198087557669',
            'username' => str_random(10),
            'open_dota' => '{"tracked_until":null,"solo_competitive_rank":null,"leaderboard_rank":null,"mmr_estimate":{"estimate":'.rand(1,5).rand(1,9).rand(1,9).rand(1,9).'},"rank_tier":'.rand(1,7).rand(0,5).',"competitive_rank":null}',
        ]);
    }
}
