<?php

namespace Categories;

use Category;
use DiceThrow;
use DieValue;

class Chance implements Category
{


    public function name()
    {
        return "Chance";
    }

    public function evaluate(DiceThrow $diceThrow)
    {
        return true;
    }

    public function score(DiceThrow $diceThrow)
    {
        return array_sum($diceThrow->values());
    }
}
