<?php
 function getRank()
    {
        
        $string = file_get_contents("https://api.opendota.com/api/players/113209044");
        $rankslice = str_after($string, 'rank_tier":');
        $rank = str_before($rankslice, ',"leaderboard_rank');    
        return $rank_numbers = substr($rank,0,1).'-'.substr($rank,1,1);


    }

