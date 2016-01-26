<?php

class Game
{
    /**
     * @var Scoreboard
     */
    private $scoreboard;
    private $availableCategories;

    public function __construct(Scoreboard $scoreboard = null)
    {
        $this->scoreboard = $scoreboard ?: new Scoreboard();
        $this->availableCategories = [
            new \Categories\Chance(),
            new \Categories\SmallStraight(),
            new \Categories\LargeStraight(),
            new \Categories\ThreeOfAKind(),
            new \Categories\FourOfAKind(),
            new \Categories\FullHouse(),
            new \Categories\Yahtzee(),
            new \Categories\Ones(),
            new \Categories\Twos(),
            new \Categories\Threes(),
            new \Categories\Fours(),
            new \Categories\Fives(),
            new \Categories\Sixes()
        ];
        $this->categoryMatcher = new CategoryMatcher(...$this->availableCategories);
    }

    public function scoreboard()
    {
        return $this->scoreboard;
    }

    public function play()
    {
        $this->scoreboard()->play(new Round($this->categoryMatcher));
    }
}
