<?php


class ScheduleBuilder
{
    /**
     * @var array Contains teams used to generate schedule
     */
    protected $teams = [];

    /**
     * @var int|null How many rounds to generate
     */
    protected $rounds = null;

    /**
     * @var bool Whether to shuffle the teams or not
     */
    protected $shuffle = true;

    /**
     * @var int|null Seed to use for shuffle
     */
    protected $seed = null;

    /**
     * Set teams and rounds at construction
     * 
     * @param array $teams
     * @param int|null $rounds
     */
    public function __construct(array $teams = [], int $rounds = null)
    {
        $this->setTeams($teams);
        $this->setRounds($rounds);
    }

    /**
     * Set teams
     * 
     * @param array $teams
     * @return void
     */
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
    }

    /**
     * Add a team to the teams array
     * 
     * @param mixed $team
     * @return void
     */
    public function addTeam($team)
    {
        $this->teams[] = $team;
    }

    /**
     * Remove a team from the teams array
     * 
     * @param mixed $team
     * @throws Exception if team does not exist in array
     * @return void
     */
    public function removeTeam($team)
    {
        $teamKeys = array_keys($this->teams, $team, true);
        if(!array_key_exists(0, $teamKeys)) {
            throw new Exception('Attempted removal of team that does not currently exist.');
        }
        $key = $teamKeys[0];
        unset($this->teams[$key]);
    }

    /**
     * Set number of rounds to generate
     * 
     * @param int|null $rounds
     * @return void
     */
    public function setRounds(int $rounds = null)
    {
        $this->rounds = $rounds;
    }

    /**
     * Set rounds to amount for each team to meet every other team
     * 
     * @return void
     */
    public function enoughRounds()
    {
        $this->setRounds(null);
    }

    /**
     * Shuffle array when generating schedule with optional seed
     * 
     * @param int|null $seed
     * @return void
     */
    public function shuffle(int $seed = null)
    {
        $this->shuffle = true;
        $this->seed = $seed;
    }

    /**
     * Do not shuffle array when generating schedule, resets seed
     * 
     * @return void
     */
    public function doNotShuffle()
    {
        $this->shuffle = false;
        $this->seed = null;
    }

    /**
     * Builds schedule based on properties
     * 
     * @return Schedule
     */
    public function build(): Schedule
    {
        return new Schedule(make_schedule($this->teams, $this->rounds, $this->shuffle, $this->seed));
    }
}
