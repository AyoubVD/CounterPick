<?php

function make_schedule(array $teams, int $rounds = null, bool $shuffle = true, int $seed = null): array
{
    $teamCount = count($teams);
    if($teamCount < 2) {
        return [];
    }
    //Account for odd number of teams by adding a bye
    if($teamCount % 2 === 1) {
        array_push($teams, null);
        $teamCount += 1;
    }
    if($shuffle) {
        //Seed shuffle with random_int for better randomness if seed is null
        srand($seed ?? random_int(PHP_INT_MIN, PHP_INT_MAX));
        shuffle($teams);
    } elseif(!is_null($seed)) {
        //Generate friendly notice that seed is set but shuffle is set to false
        trigger_error('Seed parameter has no effect when shuffle parameter is set to false');
    }
    $halfTeamCount = $teamCount / 2;
    if($rounds === null) {
        $rounds = $teamCount - 1;
    }
    $schedule = [];
    for($round = 1; $round <= $rounds; $round += 1) {
        foreach($teams as $key => $team) {
            if($key >= $halfTeamCount) {
                break;
            }
            $team1 = $team;
            $team2 = $teams[$key + $halfTeamCount];
            //Home-away swapping
            $matchup = $round % 2 === 0 ? [$team1, $team2] : [$team2, $team1];
            $schedule[$round][] = $matchup;
        }
        rotate($teams);
    }
    return $schedule;
}


function schedule(array $teams, int $rounds = null, bool $shuffle = true, int $seed = null): array
{
    return make_schedule($teams, $rounds, $shuffle, $seed);
}
