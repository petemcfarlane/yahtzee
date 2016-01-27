<?php
require __DIR__ . "/vendor/autoload.php";

$game = new Game();
for ($i = 0; $i < 13; ++$i) {
    $game->playRound();
}

header("Content-type: text/plain");
echo $game->scoreboard();