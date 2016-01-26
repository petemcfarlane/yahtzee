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

    function it_should_always_evaluate_true(DiceRoll $diceThrow)
    {
        $this->evaluate($diceThrow)->shouldBe(true);
    }

    function its_score_should_be_the_total_of_all_twos(DiceRoll $diceThrow1, DiceRoll $diceThrow2)
    {
        $diceThrow1->values()->willReturn([2, 4, 5, 1, 6]);
        $this->score($diceThrow1)->shouldBe(2);

        $diceThrow2->values()->willReturn([2, 4, 2, 2, 2]);
        $this->score($diceThrow2)->shouldBe(8);
    }
}
