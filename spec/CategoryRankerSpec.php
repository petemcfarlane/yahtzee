<?php

namespace spec;

use Category;
use DiceRoll;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryRankerSpec extends ObjectBehavior
{
    function it_should_order_categories_by_top_score(
        DiceRoll $diceThrow, Category $category1, Category $category2, Category $category3, Category $category4
    ) {
        $category1->score($diceThrow)->willReturn(50);
        $category2->score($diceThrow)->willReturn(34);
        $category3->score($diceThrow)->willReturn(23);
        $category4->score($diceThrow)->willReturn(45);

        $this->rank($diceThrow, $category1, $category2, $category3, $category4)
            ->shouldReturn([$category1, $category4, $category2, $category3]);
    }
}
