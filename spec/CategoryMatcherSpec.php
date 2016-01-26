<?php

namespace spec;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryMatcherSpec extends ObjectBehavior
{
    function it_should_return_all_the_categories_that_match_a_given_dice_roll(DiceRoll $diceRoll, Category $c1, Category $c2, Category $c3)
    {
        $c1->evaluate($diceRoll)->willReturn(false);
        $c2->evaluate($diceRoll)->willReturn(true);
        $c3->evaluate($diceRoll)->willReturn(true);

        $this->match($diceRoll, $c1, $c2, $c3)->shouldReturn([$c2, $c3]);
    }
}
