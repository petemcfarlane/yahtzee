<?php

namespace Categories;

use DiceRoll;

class Chance implements Category
{
    public function name()
    {
        return "Chance";
    }

    public function evaluate(DiceRoll $diceRoll)
    {
        return true;
    }

    public function score(DiceRoll $diceRoll)
    {
        return array_sum($diceRoll->values());
    }
}
