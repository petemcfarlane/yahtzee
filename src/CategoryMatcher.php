<?php

use Categories\NullCategory;

class CategoryMatcher
{
    private $categories = [];

    public function __construct(Category ...$categories)
    {
        $this->categories = $categories;
    }

    public function availableCategories()
    {
        return $this->categories;
    }

    public function best(DiceRoll $diceRoll)
    {
        $matching = $this->match($diceRoll);
        if (empty($matching)) {
            return new NullCategory();
        }
        $ranked = (new CategoryRanker())->rank($diceRoll, ...$matching);
        $best = array_shift($ranked);
        // danger: side effect!!
        $this->removeBestCategoryFromAvailableCategories($best);
        return $best;
    }

    private function match(DiceRoll $diceRoll)
    {
        return array_filter($this->categories, function (Category $category) use ($diceRoll) {
            return $category->evaluate($diceRoll);
        });
    }

    /**
     * @param Category $best
     */
    private function removeBestCategoryFromAvailableCategories(Category $best)
    {
        $this->categories = array_values(array_filter($this->categories, function ($category) use ($best) {
            return spl_object_hash($category) !== spl_object_hash($best);
        }));
    }
}
