<?php

use Categories\Category;

class CategoryRanker
{
    public function rank(DiceRoll $diceRoll, Category ...$categories)
    {
        @usort($categories, function (Category $a, Category $b) use ($diceRoll) {
            return $a->score($diceRoll) < $b->score($diceRoll) ? 1 : -1;
        });
        return $categories;
    }
}
