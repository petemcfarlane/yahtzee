<?php

class CategoryRanker
{
    public function rank(DiceThrow $diceThrow, Category ...$categories)
    {
        @usort($categories, function (Category $a, Category $b) use ($diceThrow) {
            return $a->score($diceThrow) < $b->score($diceThrow) ? 1 : -1;
        });
        return $categories;
    }
}
