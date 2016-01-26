<?php

use Categories\Category;
use Categories\Chance;
use Categories\Fives;
use Categories\FourOfAKind;
use Categories\Fours;
use Categories\FullHouse;
use Categories\LargeStraight;
use Categories\NullCategory;
use Categories\Ones;
use Categories\Sixes;
use Categories\SmallStraight;
use Categories\ThreeOfAKind;
use Categories\Threes;
use Categories\Twos;
use Categories\Yahtzee;

class CategoryContainer
{
    private $availableCategories;
    private $categoryMatcher;
    private $categoryRanker;

    public function __construct(CategoryMatcher $categoryMatcher = null, CategoryRanker $categoryRanker = null, array $availableCategories = null)
    {
        $this->availableCategories = $availableCategories ?: [
            new Chance(),
            new SmallStraight(),
            new LargeStraight(),
            new ThreeOfAKind(),
            new FourOfAKind(),
            new FullHouse(),
            new Yahtzee(),
            new Ones(),
            new Twos(),
            new Threes(),
            new Fours(),
            new Fives(),
            new Sixes()
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
        $this->addYahtzee2CategoryIfBestIsYahtzee($best);
        return $best;
    }

    private function removeBestCategoryFromAvailableCategories(Category $best)
    {
        $this->availableCategories = array_values(array_filter($this->availableCategories, function ($category) use ($best) {
            return spl_object_hash($category) !== spl_object_hash($best);
        }));
    }

    private function addYahtzee2CategoryIfBestIsYahtzee(Category $best)
    {
        if ($best instanceof Yahtzee) {
            $this->availableCategories[] = new \Categories\Yahtzee2();
        }
    }
}
