<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwosSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_should_be_named_twos()
    {
        $this->name()->shouldBe('Twos');
    }

    function it_should_always_evaluate_true(DiceRoll $diceRoll)
    {
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function its_score_should_be_the_total_of_all_twos(DiceRoll $diceRoll1, DiceRoll $diceRoll2)
    {
        $diceRoll1->values()->willReturn([2, 4, 5, 1, 6]);
        $this->score($diceRoll1)->shouldBe(2);

        $diceRoll2->values()->willReturn([2, 4, 2, 2, 2]);
        $this->score($diceRoll2)->shouldBe(8);
    }
}
