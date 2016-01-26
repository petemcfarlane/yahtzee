<?php

namespace spec\Categories;

use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FullHouseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_should_be_called_full_house()
    {
        $this->name()->shouldReturn("Full House");
    }

    function it_should_score_25_points(DiceRoll $diceThrow)
    {
        $this->score($diceThrow)->shouldEqual(25);
    }

    function it_should_evaluate_true_if_there_are_three_of_a_kind_and_two_of_a_kind(DiceRoll $diceThrow)
    {
        $diceThrow->values()->willReturn([3, 3, 4, 4, 4]);
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function it_should_return_false_otherwise(DiceRoll $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 3, 3, 3]);
        $this->evaluate($diceThrow)->shouldBe(false);
    }
}
