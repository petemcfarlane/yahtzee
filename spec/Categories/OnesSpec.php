<?php

namespace spec\Categories;

use DiceThrow;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_should_be_named_ones()
    {
        $this->name()->shouldBe("Ones");
    }

    function it_should_always_evaluate_as_true(DiceThrow $diceThrow)
    {
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_should_total_the_number_of_ones_in_a_throw_as_a_score(DiceThrow $diceThrow1, DiceThrow $diceThrow2)
    {
        $diceThrow1->values()->willReturn([5, 3, 1, 3, 1]);
        $this->score($diceThrow1)->shouldBe(2);

        $diceThrow2->values()->willReturn([1, 1, 1, 3, 1]);
        $this->score($diceThrow2)->shouldBe(4);
    }
}
