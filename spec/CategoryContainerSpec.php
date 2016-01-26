<?php

namespace spec;

use Categories\NullCategory;
use Categories\Category;
use CategoryMatcher;
use CategoryRanker;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryContainerSpec extends ObjectBehavior
{
    function let(CategoryMatcher $matcher, CategoryRanker $ranker, Category $c1, Category $c2, Category $c3)
    {
        $this->beConstructedWith($matcher, $ranker, [$c1, $c2, $c3]);
    }

    function it_can_choose_the_best_matching_category_and_remove_from_available_categories(DiceRoll $diceRoll, CategoryMatcher $matcher, CategoryRanker $ranker, $c1, $c2, $c3)
    {
        $diceRoll->values()->willReturn([1, 2, 3, 2, 1]);
        $matcher->match($diceRoll, $c1, $c2, $c3)->willReturn([$c2, $c3]);
        $ranker->rank($diceRoll, $c2, $c3)->willReturn([$c3, $c2]);
        $this->best($diceRoll)->shouldBe($c3);
    }

    function it_should_return_null_category_if_there_are_no_matching_categories_left_available(DiceRoll $diceRoll, $matcher, $ranker)
    {
        $this->beConstructedWith($matcher, $ranker, []); // no categories

        $this->best($diceRoll)->shouldReturnAnInstanceOf(NullCategory::class);
    }
}
