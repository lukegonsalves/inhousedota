<?php
    // all of these functions need to be pushed to user db - figure out how to do this
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

    function getRank()
    {
        $userid = toUserID(Auth::user()->steamid);

        $rank_url_lookup = "https://api.opendota.com/api/players/" . $userid; // append the steam3id to the opendota api call
        $string = file_get_contents($rank_url_lookup); // get the contents of the api call
        $rankslice = str_after($string, 'rank_tier":'); // string slicing to get rank
        $rank = str_before($rankslice, ',"leaderboard_rank'); // 2nd string slice to get rank
        return $rank_numbers = substr($rank,0,1).'-'.substr($rank,1,1); //return the rank in the form x-x


    }

    function parseRank()
    {
        $rank = getRank();
        $rankmajor = str_before($rank, "-");
        $rankminor = str_after($rank, "-");

        switch($rankmajor){
            case "0":
                $rankmajorname = "Unranked";
                break;
            case "1":
                $rankmajorname = "Herald";
                break;
            case "2":
                $rankmajorname = "Guardian";
                break;
            case "3":
                $rankmajorname = "Crusader";
                break;
            case "4":
                $rankmajorname = "Archon";
                break;
            case "5":
                $rankmajorname = "Legend";
                break;
            case "6":
                $rankmajorname = "Ancient";
                break;
            case "7":
                $rankmajorname = "Divine";
                break;    
        }
        $rankminorname = " " . $rankminor;
        return $rankmajorname . $rankminorname;
    }
    
    function getBracket()
    {
        $rank = getRank();
        $rankmajor = str_before($rank, "-");
        if($rankmajor < "5")
        {
            return "Shitter m8";
        }
        else{
            return "Gooder"; 
        }
    }

    //"https://api.opendota.com/api/players/113209044"