<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiceRollSpec extends ObjectBehavior
{
    function it_should_have_5_values()
    {
        $values = $this->values();
        $values->shouldBeArray();
        $values->shouldHaveCount(5);
    }

    function it_can_have_pre_determined_values()
    {
        $this->beConstructedWith(1, 2, 3, 4, 5);
        $this->values()->shouldBe([1, 2, 3, 4, 5]);
    }
}
