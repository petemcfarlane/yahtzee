<?php

namespace spec\Categories;

use Categories\Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_should_be_named_ones()
    {
        $this->name()->shouldBe("Ones");
    }

    function it_should_always_evaluate_as_true(DiceRoll $diceRoll)
    {
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_should_total_the_number_of_ones_in_a_throw_as_a_score(DiceRoll $diceRoll1, DiceRoll $diceRoll2)
    {
        $diceRoll1->values()->willReturn([5, 3, 1, 3, 1]);
        $this->score($diceRoll1)->shouldBe(2);

        $diceRoll2->values()->willReturn([1, 1, 1, 3, 1]);
        $this->score($diceRoll2)->shouldBe(4);
    }
}
