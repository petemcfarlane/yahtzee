<?php

namespace Categories;


use Category;
use DiceThrow;

abstract class UpperSection implements Category
{
    public function evaluate(DiceThrow $diceThrow)
    {
        return true;
    }

    public function score(DiceThrow $diceThrow)
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