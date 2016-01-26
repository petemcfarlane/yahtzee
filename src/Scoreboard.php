<?php

class Scoreboard
{
    private $rounds = [];

    public function rounds()
    {
        return $this->rounds;
    }

    public function play(Round $round)
    {
        if (count($this->rounds) === 13) {
            throw new CannotPlayMoreThanThirteenRounds;
        }
        $this->rounds[] = $round;
    }

    public function totalScore()
    {
        return array_sum(array_map(function (Round $round) {
            return $round->score();
        }, $this->rounds));
    }

    public function __toString()
    {
        $header = "Round | Roll            | Category        | Score"
               ."\n======|=================|=================|======\n";

        $i = 0;
        $str = array_reduce($this->rounds, function ($carry, Round $round) use (&$i) {
            $args = $round->diceRollValues();
            array_unshift($args, ++$i);
            $args[] = $round->categoryName();
            $args[] = $round->score();
            return $carry . sprintf("%5d | [%d, %d, %d, %d, %d] | %-15s | %d", ...$args) . PHP_EOL;
        }, $header);
        return $str . "\nTotal: " . $this->totalScore();
    }
}
