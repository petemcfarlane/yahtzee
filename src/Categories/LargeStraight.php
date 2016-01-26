<?php

namespace Categories;

use DiceRoll;

class LargeStraight implements Category
{
    public function evaluate(DiceRoll $diceThrow)
    {
        return $this->isInOrder($diceThrow->values());
    }

    public function score(DiceRoll $diceThrow)
    {
        return 40;
    }

    public function name()
    {
        return "Large Straight";
    }

    public function isInOrder(array $values)
    {
        sort($values);
        for ($i = 0, $v = $values[0]; $i < count($values); $i++, $v++) {
            if ($values[$i] !== $v) {
                return false;
            }
        }
        return true;
    }
}
