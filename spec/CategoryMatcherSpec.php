<?php

namespace spec;

use Categories\NullCategory;
use Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryMatcherSpec extends ObjectBehavior
{
    function let(Category $category1, Category $category2, Category $category3)
    {
        $this->beConstructedWith($category1, $category2, $category3);
    }

    function it_should_return_the_best_category_and_the_remaining_category_list(DiceRoll $diceRoll, $category1, $category2, $category3)
    {
        $category1->evaluate($diceRoll)->willReturn(false);
        $category2->evaluate($diceRoll)->willReturn(true);
        $category3->evaluate($diceRoll)->willReturn(true);

        $category2->score($diceRoll)->willReturn(50);
        $category3->score($diceRoll)->willReturn(40);

        $this->best($diceRoll)->shouldReturn($category2);
        $this->availableCategories()->shouldReturn([$category1, $category3]);
    }

    function it_should_return_null_category_if_there_are_no_matching_categories_left_available(DiceRoll $diceRoll)
    {
        $this->beConstructedWith(); // no categories

        $this->best($diceRoll)->shouldReturnAnInstanceOf(NullCategory::class);
    }
}
