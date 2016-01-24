<?php

namespace Categories;

use Category;
use DiceThrow;

class Yahtzee implements Category
{
    public function evaluate(DiceThrow $diceThrow)
    {
        $values = $diceThrow->values();
        $initialValue = array_shift($values);
        foreach ($values as $remainingValue) {
            if ($remainingValue !== $initialValue) {
                return false;
            }
        }
        return true;
    }

    public function score(DiceThrow $diceThrow)
    {
        return 50;
    }

    public function name()
    {
        return 'Yahtzee';
    }
}
