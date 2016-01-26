<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiceRollSpec extends ObjectBehavior
{
    function it_should_have_5_values()
    {
        $this->values()->shouldBeArray();
    }
}
