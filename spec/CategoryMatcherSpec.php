<?php

namespace spec;

use Category;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryMatcherSpec extends ObjectBehavior
{
    function it_should_match_a_dice_throw_against_13_categories(\DiceThrow $diceThrow)
    {
        $diceThrow->values()->willReturn([1, 2, 3, 4, 5]);
        $this->match($diceThrow)->shouldContainUpTo13Categories();
    }

    function getMatchers()
    {
        return [
            'containUpTo13Categories' => function ($subject) {
                foreach ($subject as $category) {
                    if (!is_a($category, Category::class)) {
                        throw new FailureException(get_class($category) . " was not an instance of Category.");
                    }
                }
                return is_array($subject) && count($subject) <= 13;
            }
        ];
    }
}
