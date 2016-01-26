<?php

use Categories\Category;

class Round
{
    /**
     * @var DiceRoll
     */
    private $diceRoll;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var int
     */
    private $score;

    public function __construct(CategoryContainer $categoryContainer, DiceRoll $diceRoll = null)
    {
        $this->diceRoll = $diceRoll ?: new DiceRoll();
        $this->category = $categoryContainer->best($this->diceRoll);
        $this->score = $this->category->score($this->diceRoll);
    }

    public function diceRollValues()
    {
        return $this->diceRoll->values();
    }

    public function categoryName()
    {
        return $this->category->name();
    }

    public function score()
    {
        return $this->score;
    }

}
