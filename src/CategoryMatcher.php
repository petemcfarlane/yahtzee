<?php

class CategoryMatcher
{
    private $categories;

    public function __construct()
    {
        $this->categories = [
            new \Categories\Chance(),
            new \Categories\SmallStraight(),
            new \Categories\LargeStraight()
        ];
    }

    public function match(DiceThrow $diceThrow)
    {
        return array_filter($this->categories, function (Category $category) use ($diceThrow) {
            return $category->evaluate($diceThrow);
        });
    }
}
