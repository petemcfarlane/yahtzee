<?php

namespace Categories;

use Category;
use DiceThrow;

class FullHouse implements Category
{
    public function evaluate(DiceThrow $diceThrow)
    {
        $grouped = [];

        foreach ($diceThrow->values() as $value) {
            if (array_key_exists($value, $grouped)) {
                $grouped[$value]++;
            } else {
                $grouped[$value] = 1;
            }
        }

        return count($grouped) === 2;
    }

    public function score(DiceThrow $diceThrow)
    {
        return 25;
    }

    public function name()
    {
        return "Full House";
    }
}
