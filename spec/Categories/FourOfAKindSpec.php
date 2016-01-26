<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FourOfAKindSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_evaluates_true_if_there_are_four_of_the_same_value(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([2, 2, 5, 2, 2]);
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_evaluates_false_otherwise(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([1, 4, 3, 4, 4]);
        $this->evaluate($diceRoll)->shouldBe(false);
    }

    function it_should_sum_the_dice_to_calculate_the_score(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([2, 2, 5, 2, 2]);
        $this->score($diceRoll)->shouldBe(13);
    }

    function it_should_be_called_three_of_a_kind()
    {
        $this->name()->shouldReturn("Four of a Kind");
    }
}
