<?php

namespace spec\Categories;

use DiceThrow;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LargeStraightSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_evaluates_true_if_all_5_dice_are_in_order(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([2, 1, 3, 5, 4]);
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([2, 2, 4, 5, 6]);
        $this->evaluate($diceThrow)->shouldBe(false);
    }

    function it_should_have_a_score_of_40_points(DiceThrow $diceThrow)
    {
        $this->score($diceThrow)->shouldReturn(40);
    }
}
