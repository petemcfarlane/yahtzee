<?php

namespace Categories;

use DiceThrow;
use DieValue;

class LargeStraight implements \Category
{
    public function evaluate(DiceThrow $diceThrow)
    {
        return $this->isInOrder($diceThrow->values());
    }

    public function score(DiceThrow $diceThrow)
    {
        return 40;
    }

    public function name()
    {
        return "Small Straight";
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
