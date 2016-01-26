<?php

namespace spec;

use Categories\Chance;
use CategoryMatcher;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoundSpec extends ObjectBehavior
{
    function let(DiceRoll $diceRoll, CategoryMatcher $categoryMatcher, Chance $chance)
    {
        $diceRoll->values()->willReturn([1, 2, 3, 1, 2]);
        $categoryMatcher->best($diceRoll)->willReturn($chance);
        $chance->score($diceRoll)->willReturn(9);
        $chance->name()->willReturn('Chance');
        $this->beConstructedWith($categoryMatcher, $diceRoll);
    }

    function it_has_dice_roll_values()
    {
        $this->diceRollValues()->shouldReturn([1, 2, 3, 1, 2]);
    }

    function it_has_a_category_name()
    {
        $this->categoryName()->shouldReturn('Chance');
    }

    function it_has_a_score()
    {
        $this->score()->shouldEqual(9);
    }
}
