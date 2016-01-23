<?php

namespace spec\Categories;

use DiceThrow;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ThreeOfAKindSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_evaluates_true_if_there_are_three_of_the_same_value(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 4, 2, 2]);
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 3, 4, 4]);
        $this->evaluate($diceThrow)->shouldBe(false);
    }

    function it_should_sum_the_dice_to_calculate_the_score(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 4, 2, 2]);
        $this->score($diceThrow)->shouldBe(11);
    }

    function it_should_be_called_three_of_a_kind()
    {
        $this->name()->shouldReturn("Three of a Kind");
    }
}
