<?php

namespace spec;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DieValueSpec extends ObjectBehavior
{
    function it_should_have_a_random_value()
    {
        $this->value()->shouldBeBetween(1, 6);
    }

    function it_can_be_given_a_value_on_creation()
    {
        $this->beConstructedWith(5);
        $this->value()->shouldBe(5);
    }

    function getMatchers()
    {
        return [
            'beBetween' => function ($subject, $min, $max) {
                if ($subject < $min || $subject > $max) {
                    throw new FailureException("Subject ($subject) was not between min ($min) and max ($max)");
                };
                return true;
            }
        ];
    }
}
