<?php

namespace Categories;


use Category;
use DiceRoll;

abstract class UpperSection implements Category
{
    public function evaluate(DiceRoll $diceThrow)
    {
        return true;
    }

    public function score(DiceRoll $diceThrow)
    {
        return array_sum(array_filter($diceThrow->values(), function ($value) {
            return $value === $this->number();
        }));
    }

    abstract public function number();

    public function name()
    {
        return substr(static::class, 11);
    }
}