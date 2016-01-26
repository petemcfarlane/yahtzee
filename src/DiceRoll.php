<?php

class DiceRoll
{
    private $values;

    public function __construct()
    {
        $this->values = [
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
        }, $this->values);
    }
}
