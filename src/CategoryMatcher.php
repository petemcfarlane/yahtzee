<?php

class CategoryMatcher
{
    private $categories;

    public function __construct()
    {
        $this->categories = [
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
    }

    public function match(DiceThrow $diceThrow)
    {
        return array_filter($this->categories, function (Category $category) use ($diceThrow) {
            return $category->evaluate($diceThrow);
        });
    }
}
