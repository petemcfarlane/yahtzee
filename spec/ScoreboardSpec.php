<?php

namespace spec;

use CannotPlayMoreThanThirteenRounds;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Round;

class ScoreboardSpec extends ObjectBehavior
{
    function it_should_have_rounds()
    {
        $this->rounds()->shouldBeArray();
    }

    function it_can_play_a_round(Round $round)
    {
        $this->play($round);
        $this->rounds()->shouldContain($round);
    }

    function it_can_only_play_13_rounds(Round $round)
    {
        for ($i = 0; $i < 13; ++$i) {
            $this->play($round);
        }

        $this->shouldThrow(CannotPlayMoreThanThirteenRounds::class)->during('play', [$round]);
    }

    function it_should_have_a_total_score()
    {
        $this->totalScore()->shouldBeInteger();
    }

    function it_can_be_represented_as_a_string(Round $round)
    {
        $round->diceRollValues()->willReturn([1, 2, 3, 4, 5]);
        $round->categoryName()->willReturn('Chance');
        $round->score()->willReturn(15);
        $this->play($round);

        $this->__toString()->shouldMatch("/\s*\d \| \[\d, \d, \d, \d, \d\] \| [\w|\s]+\| \d+\n/m");
    }
}
