<?php

namespace Categories;

use Category;
use DiceRoll;

class Yahtzee implements Category
{
    public function evaluate(DiceRoll $diceThrow)
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

    public function score(DiceRoll $diceThrow)
    {
        return 50;
    }

    public function name()
    {
        return 'Yahtzee';
    }
}
