<?php

use Categories\Category;
use Categories\NullCategory;

class CategoryContainer
{
    private $availableCategories;
    private $categoryMatcher;
    private $categoryRanker;

    public function __construct(CategoryMatcher $categoryMatcher = null, CategoryRanker $categoryRanker = null, array $availableCategories = null)
    {
        $this->availableCategories = $availableCategories ?: [
            new \Categories\Chance(),
            new \Categories\SmallStraight(),
            new \Categories\LargeStraight(),
            new \Categories\ThreeOfAKind(),
            new \Categories\FourOfAKind(),
            new \Categories\FullHouse(),
            new \Categories\Yahtzee(),
            new \Categories\Ones(),
            new \Categories\Twos(),
            new \Categories\Threes(),
            new \Categories\Fours(),
            new \Categories\Fives(),
            new \Categories\Sixes()
        ];
        $this->categoryMatcher = $categoryMatcher ?: new CategoryMatcher();
        $this->categoryRanker = $categoryRanker ?: new CategoryRanker();
    }

    public function best(DiceRoll $diceRoll)
    {
        $matching = $this->categoryMatcher->match($diceRoll, ...$this->availableCategories);
        if (empty($matching)) {
            return new NullCategory();
        }
        $ranked = $this->categoryRanker->rank($diceRoll, ...$matching);
        $best = array_shift($ranked);
        // danger: side effect!!
        $this->removeBestCategoryFromAvailableCategories($best);
        return $best;
    }

    private function removeBestCategoryFromAvailableCategories(Category $best)
    {
        $this->availableCategories = array_values(array_filter($this->availableCategories, function ($category) use ($best) {
            return spl_object_hash($category) !== spl_object_hash($best);
        }));
    }
}
