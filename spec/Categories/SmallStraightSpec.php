<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SmallStraightSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_evaluates_true_if_at_least_4_dice_are_in_a_straight(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([2, 5, 3, 5, 4]);
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([1, 2, 2, 6, 6]);
        $this->evaluate($diceRoll)->shouldBe(false);
    }

    function it_should_have_a_score_of_30_points(DiceRoll $diceRoll)
    {
        $this->score($diceRoll)->shouldReturn(30);
    }

    function it_should_be_called_small_straight()
    {
        $this->name()->shouldReturn("Small Straight");
    }

}
