<?php

namespace Categories;

use DiceRoll;

class FourOfAKind implements Category
{
    public function evaluate(DiceRoll $diceThrow)
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

    public function score(DiceRoll $diceThrow)
    {
        return array_sum($diceThrow->values());
    }

    public function name()
    {
        return "Four of a Kind";
    }
}
