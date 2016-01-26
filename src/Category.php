<?php

interface Category
{
    public function evaluate(DiceRoll $diceRoll);
    public function score(DiceRoll $diceRoll);
    public function name();
}