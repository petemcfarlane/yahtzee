<?php

class DiceThrow
{
    private $diceValues;

    public function roll()
    {
        $this->diceValues = [
            new DieValue(),
            new DieValue(),
            new DieValue(),
            new DieValue(),
            new DieValue()
        ];
    }

    public function values()
    {
        return array_map(function (DieValue $die) {
            return $die->value();
        }, $this->diceValues);
    }
}
