<?php

class Schedule implements IteratorAggregate
{
    /**
     * @see make_schedule
     *  
     * @var array An array of rounds, in the format of $round => $matchups, 
     *     where each matchup has only two elements with the two teams as 
     *     elements [0] and [1] or for a $teams array with an odd element count,
     *     may have one of these elements as null to signify a bye for the 
     *     other actual team element in the matchup array
     */
    protected $full = [];

    /**
     * @var array Stores individual team schedules, format of
     *     Schedule::$team[{team}][{round}] = {team2}
     */
    protected $team = [];

    /**
     * Constructor
     * 
     * @see Schedule::$full
     * @param array $full The full schedule generally generated by the
     *     make_schedule function
     */
    public function __construct(array $full)
    {
        $this->full = $full;
    }

    /**
     * Get full schedule as array
     * 
     * @see Schedule::$full
     * @return array
     */
    public function full(): array
    {
        return $this->full;
    }

    /**
     * Generates all team schedules based on full schedule and stores result
     */
    protected function makeTeam()
    {
        $fullSchedule = $this->full();
        $teamSchedule = [];
        foreach($fullSchedule as $round => $matchups) {
            foreach($matchups as $matchup) {
                $team1 = $matchup[0];
                $team2 = $matchup[1];
                $teamSchedule[$team1][$round] = ['team' => $team2, 'home' => false];
                $teamSchedule[$team2][$round] = ['team' => $team1, 'home' => true];
            }
        }
        $this->team = $teamSchedule;
    }

    /**
     * Get schedule for specific team
     * 
     * @param mixed $team
     * @return array
     */
    public function forTeam($team): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_key_exists($team, $this->team) ? $this->team[$team] : [];
    }

    /**
     * Get all scheduled teams
     * 
     * @return array
     */
    public function teams(): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_filter(array_keys($this->team));
    }

    /**
     * Returns full schedule or team schedule if team parameter is not null
     * 
     * @param mixed $team
     * @return array
     */
    public function get($team = null): array
    {
        if(!is_null($team)) {
            return $this->forTeam($team);
        }
        return $this->full();
    }

    /**
     * Implements IteratorAggregate
     * 
     * Provides ability to iterate over schedule directly from object
     * 
     * @return \Iterator
     */
    final public function getIterator(): Iterator
    {
        return new ArrayIterator($this->full());
    }

    /**
     * Allows returning full or team schedule by invoking object
     * 
     * Will return team schedule if team is not null and exists
     * 
     * @param mixed $team
     * @return array
     */
    final public function __invoke($team = null): array
    {
        return $this->get($team);
    }

    /**
     * Returns simple string representation of  full schedule
     * 
     * @return string
     */
    public function __toString(): string
    {
        $str = '';
        $full = $this->full();
        foreach($full as $round => $matchups) {
            $str .= "Round {$round}:".PHP_EOL;
            foreach($matchups as $matchup) {
                $str .= ($matchup[0] ?? '*BYE*').' vs. '.($matchup[1] ?? '*BYE*').PHP_EOL;
            }
        }
        return $str;
    }
}