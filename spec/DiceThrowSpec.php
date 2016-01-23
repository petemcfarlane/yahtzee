<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiceThrowSpec extends ObjectBehavior
{
    function it_should_have_5_values_after_a_throw()
    {
        $this->roll();
        $this->values()->shouldBeArray();
    }
}
