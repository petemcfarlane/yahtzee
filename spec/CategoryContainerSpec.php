<?php

namespace spec;

use Categories\NullCategory;
use Categories\Category;
use Categories\Yahtzee;
use Categories\Yahtzee2;
use CategoryMatcher;
use CategoryRanker;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Round;

class CategoryContainerSpec extends ObjectBehavior
{
    function let(CategoryMatcher $matcher, CategoryRanker $ranker, Category $c1, Category $c2, Category $c3, Yahtzee $yahtzee)
    {
        $this->beConstructedWith($matcher, $ranker, [$c1, $c2, $c3, $yahtzee]);
    }

    function it_can_choose_the_best_matching_category_and_remove_from_available_categories(DiceRoll $diceRoll, CategoryMatcher $matcher, CategoryRanker $ranker, $c1, $c2, $c3, $yahtzee)
    {
        $diceRoll->values()->willReturn([1, 2, 3, 2, 1]);
        $matcher->match($diceRoll, $c1, $c2, $c3, $yahtzee)->willReturn([$c2, $c3]);
        $ranker->rank($diceRoll, $c2, $c3)->willReturn([$c3, $c2]);
        $this->best($diceRoll)->shouldBe($c3);
    }

    function it_should_return_null_category_if_there_are_no_matching_categories_left_available(DiceRoll $diceRoll, $matcher, $ranker)
    {
        $this->beConstructedWith($matcher, $ranker, []); // no categories

        $this->best($diceRoll)->shouldReturnAnInstanceOf(NullCategory::class);
    }

    function it_should_add_a_yahtzee2_category_if_a_yahtzee_has_been_played(DiceRoll $roll1, DiceRoll $roll2, Yahtzee $yahtzee, Yahtzee2 $yahtzee2, CategoryMatcher $matcher, CategoryRanker $ranker, $c1, $c2, $c3)
    {
        $roll1->values()->willReturn([1, 1, 1, 1, 1]);
        $matcher->match($roll1, $c1, $c2, $c3, $yahtzee)->willReturn([$c1, $yahtzee]);
        $ranker->rank($roll1, $c1, $yahtzee)->willReturn([$yahtzee, $c1]);

        $this->best($roll1)->shouldBe($yahtzee);

        $roll2->values()->willReturn([4, 4, 4, 4, 4]);
        // Note, a new Yahtzee2 category is available!
        $matcher->match($roll2, $c1, $c2, $c3, Argument::type(Yahtzee2::class))->willReturn([$c1, $yahtzee2]);
        $ranker->rank($roll2, $c1, $yahtzee2)->willReturn([$yahtzee2, $c1]);

        $this->best($roll2)->shouldReturn($yahtzee2);
    }
}
