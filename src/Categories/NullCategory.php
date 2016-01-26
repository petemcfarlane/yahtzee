<?php

namespace Categories;

use Category;
use DiceRoll;

class NullCategory implements Category
{
    public function evaluate(DiceRoll $diceRoll)
    {
        return true;
    }

    public function score(DiceRoll $diceRoll)
    {
        return 0;
    }

    public function name()
    {
        return '';
    }
}
