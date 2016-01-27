<?php

class Game
{
    /**
     * @var Scoreboard
     */
    private $scoreboard;

    /**
     * @var CategoryContainer
     */
    private $categoryContainer;

    public function __construct(Scoreboard $scoreboard = null, CategoryContainer $categoryContainer = null)
    {
        $this->scoreboard = $scoreboard ?: new Scoreboard();
        $this->categoryContainer = $categoryContainer?: new CategoryContainer();
    }

    public function scoreboard()
    {
        return $this->scoreboard;
    }

    public function playRound()
    {
        $this->scoreboard()->play(new Round($this->categoryContainer));
    }
}
