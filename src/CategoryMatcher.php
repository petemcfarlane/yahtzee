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
            new \Categories\FourOfAKind()
        ];
    }

    public function match(DiceThrow $diceThrow)
    {
        return array_filter($this->categories, function (Category $category) use ($diceThrow) {
            return $category->evaluate($diceThrow);
        });
    }
}
