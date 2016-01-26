<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YahtzeeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_should_be_called_yahtzee()
    {
        $this->name()->shouldBe('Yahtzee');
    }

    function it_should_score_50_points(DiceRoll $diceRoll)
    {
        $this->score($diceRoll)->shouldBe(50);
    }

    function it_should_evaluate_as_true_if_all_5_die_are_of_the_same_number(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([5, 5, 5, 5, 5]);
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_should_evaluate_false_otherwise(DiceRoll $diceRoll)
    {
        $diceRoll->values()->willReturn([3, 3, 3, 3, 6]);
        $this->evaluate($diceRoll)->shouldBe(false);
    }
}
