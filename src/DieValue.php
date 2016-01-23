<?php

class DieValue
{
    private $value;

    public function __construct($value = null)
    {
        $this->value = isset($value) ? $value : rand(1, 6);
    }

    public function value()
    {
        return $this->value;
    }
}
