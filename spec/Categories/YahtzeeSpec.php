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

    function it_should_score_50_points(DiceRoll $diceThrow)
    {
        $this->score($diceThrow)->shouldBe(50);
    }

    function it_should_evaluate_as_true_if_all_5_die_are_of_the_same_number(DiceRoll $diceThrow)
    {
        $diceThrow->values()->willReturn([5, 5, 5, 5, 5]);
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_should_evaluate_false_otherwise(DiceRoll $diceThrow)
    {
        $diceThrow->values()->willReturn([3, 3, 3, 3, 6]);
        $this->evaluate($diceThrow)->shouldBe(false);
    }
}
