<?php
 function getRank()
    {

        $rank_url_lookup = "https://api.opendota.com/api/players/113209044"; // append the steam3id to the opendota api call
        $string = file_get_contents($rank_url_lookup); // get the contents of the api call
        $rankslice = str_after($string, 'rank_tier":'); // string slicing to get rank
        $rank = str_before($rankslice, ',"leaderboard_rank'); // 2nd string slice to get rank
        return $rank_numbers = substr($rank,0,1).'-'.substr($rank,1,1); //return the rank in the form x-x


    }


    function toUserID($id) {
        if (preg_match('/^STEAM_/', $id)) {
            $split = explode(':', $id);
            return $split[2] * 2 + $split[1];
        } elseif (preg_match('/^765/', $id) && strlen($id) > 15) {
            return bcsub($id, '76561197960265728');
        } else {
            return $id; // We have no idea what this is, so just return it.
        }
    }
    //"https://api.opendota.com/api/players/113209044"