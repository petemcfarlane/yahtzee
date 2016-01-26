<?php

use Categories\Category;

class CategoryMatcher
{
    public function match(DiceRoll $diceRoll, Category ...$categories)
    {
        return array_values(array_filter($categories, function (Category $category) use ($diceRoll) {
            return $category->evaluate($diceRoll);
        }));
    }
}
