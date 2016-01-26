<?php

namespace spec\Categories;

use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChanceSpec extends ObjectBehavior
{
    function it_should_always_be_able_to_evaluate(DiceRoll $diceThrow)
    {
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_should_have_a_total_score_which_is_the_sum_of_its_values(DiceRoll $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 3, 4, 5]);
        $this->score($diceThrow)->shouldBe(15);
    }

    function it_should_have_a_name()
    {
        $this->name()->shouldReturn("Chance");
    }
}
