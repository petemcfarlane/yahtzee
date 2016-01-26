<?php
require __DIR__ . "/vendor/autoload.php";

$game = new Game();
for ($i = 0; $i < 13; ++$i) {
    $game->play();
}

header("Content-type: text/plain");
echo $game->scoreboard();