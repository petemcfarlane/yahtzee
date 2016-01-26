<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LargeStraightSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_evaluates_true_if_all_5_dice_are_in_order(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([2, 1, 3, 5, 4]);
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([2, 2, 4, 5, 6]);
        $this->evaluate($diceRoll)->shouldBe(false);
    }

    function it_should_have_a_score_of_40_points(DiceRoll $diceRoll)
    {
        $this->score($diceRoll)->shouldReturn(40);
    }

    function it_should_be_called_large_straight()
    {
        $this->name()->shouldReturn("Large Straight");
    }
}
