<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Scoreboard;

class GameSpec extends ObjectBehavior
{
    function it_should_have_a_scoreboard()
    {
        $this->scoreboard()->shouldBeAnInstanceOf(Scoreboard::class);
    }

    function it_should_be_able_to_play_a_round()
    {
        $this->playRound();
    }
}
