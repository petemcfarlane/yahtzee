<?php

namespace Categories;

use Category;
use DiceThrow;

class FourOfAKind implements Category
{
    public function evaluate(DiceThrow $diceThrow)
    {
        $groupedValues = [];
        foreach($diceThrow->values() as $value) {
            if (array_key_exists($value, $groupedValues)) {
                $groupedValues[$value]++;
            } else {
                $groupedValues[$value] = 1;
            }
        }
        return ! empty(array_filter($groupedValues, function ($freq) {
            return $freq >= 4;
        }));
    }

    public function score(DiceThrow $diceThrow)
    {
        return array_sum($diceThrow->values());
    }

    public function name()
    {
        return "Four of a Kind";
    }
}
