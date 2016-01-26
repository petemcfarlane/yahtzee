<?php

namespace Categories;

use DiceRoll;

class FullHouse implements Category
{
    public function evaluate(DiceRoll $diceThrow)
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

    public function score(DiceRoll $diceThrow)
    {
        return 25;
    }

    public function name()
    {
        return "Full House";
    }
}
