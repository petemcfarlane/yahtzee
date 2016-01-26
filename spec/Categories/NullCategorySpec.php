<?php

namespace spec\Categories;

use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NullCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Category');
    }

    function it_should_have_an_empty_category_name()
    {
        $this->name()->shouldBe("");
    }

    function it_should_always_evaluate_as_true(DiceRoll $diceRoll)
    {
        $this->evaluate($diceRoll)->shouldBe(true);
    }

    function it_should_have_a_score_of_zero(DiceRoll $diceRoll)
    {
        $this->score($diceRoll)->shouldEqual(0);
    }

}
