<?php

class DiceRoll
{
    private $values;

    public function __construct($d1 = null, $d2 = null, $d3 = null, $d4 = null, $d5 = null)
    {
        $this->values = [
            $this->isValid($d1) ? $d1 : rand(1, 6),
            $this->isValid($d2) ? $d2 : rand(1, 6),
            $this->isValid($d3) ? $d3 : rand(1, 6),
            $this->isValid($d4) ? $d4 : rand(1, 6),
            $this->isValid($d5) ? $d5 : rand(1, 6)
        ];
    }

    public function values()
    {
        return $this->values;
    }

    private function isValid($d)
    {
        return !is_null($d) && $d >= 1 && $d <= 6;
    }
}
