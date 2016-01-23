<?php

namespace Categories;

use Category;
use DiceThrow;

class SmallStraight implements Category
{
    public function name()
    {
        return "Small Straight";
    }

    public function evaluate(DiceThrow $diceThrow)
    {
        $values = $diceThrow->values();
        $permutations = [
            [$values[0], $values[1], $values[2], $values[3]],
            [$values[1], $values[2], $values[3], $values[4]],
            [$values[0], $values[2], $values[3], $values[4]],
            [$values[0], $values[1], $values[2], $values[4]],
            [$values[0], $values[1], $values[2], $values[3]],
        ];

        foreach ($permutations as $permutation) {
            if ($this->isInOrder($permutation)) {
                return true;
            }
        }

        return false;

    }

    public function score(DiceThrow $diceThrow)
    {
        return 30;
    }

    public function isInOrder(array $permutation)
    {
        sort($permutation);
        for ($i = 0, $v = $permutation[0]; $i < count($permutation); $i++, $v++) {
            if ($permutation[$i] !== $v) {
                return false;
            }
        }
        return true;
    }
}
