<?php

interface Category
{
    public function evaluate(DiceThrow $diceThrow);
    public function score(DiceThrow $diceThrow);
    public function name();
}