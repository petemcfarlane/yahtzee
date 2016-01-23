<?php

namespace spec\Categories;

use DiceThrow;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SmallStraightSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_evaluates_true_if_at_least_4_dice_are_in_a_straight(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([2, 5, 3, 5, 4]);
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 2, 6, 6]);
        $this->evaluate($diceThrow)->shouldBe(false);
    }

    function it_should_have_a_score_of_30_points(DiceThrow $diceThrow)
    {
        $this->score($diceThrow)->shouldReturn(30);
    }
}
