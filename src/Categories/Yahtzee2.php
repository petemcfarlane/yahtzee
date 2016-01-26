<?php

namespace Categories;

use DiceRoll;

class Yahtzee2 implements Category
{
    public function score(DiceRoll $diceRoll)
    {
        return 100;
    }

    public function evaluate(DiceRoll $diceRoll)
    {
        $values = $diceRoll->values();
        $initialValue = array_shift($values);
        foreach ($values as $remainingValue) {
            if ($remainingValue !== $initialValue) {
                return false;
            }
        }
        return true;
    }

    public function name()
    {
        return 'Yahtzee';
    }
}
