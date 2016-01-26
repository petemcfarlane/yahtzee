<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Yahtzee2Spec extends ObjectBehavior
{
    function it_is_a_category()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_should_be_called_yahtzee()
    {
        $this->name()->shouldReturn("Yahtzee");
    }

    function it_should_evaluate_true_if_all_dice_are_the_same_value(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([3, 3, 3, 3, 3]);
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_should_evaluate_false_otherwise(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([3, 3, 2, 3, 1]);
        $this->evaluate($diceRoll)->shouldBe(false);
    }

    function it_should_be_worth_100_points(DiceRoll $diceRoll)
    {
        $this->score($diceRoll)->shouldEqual(100);
    }
}
