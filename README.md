# Yahtzee

This app simulates a game of Yahtzee, [the dice game](http://www.yahtzee.org.uk/rules.html).

To run this in the [PHP built in web server](http://php.net/manual/en/features.commandline.webserver.php) (PHP 5.4+), clone the repository, then run 
```
$ git clone https://github.com/petemcfarlane/yahtzee.git
$ cd yahtzee
$ php -S localhost:8000
```

then navigate to http://localhost:8000 in your web browser.

## Brief synopsis of the game:
The game starts by a player rolling 5 dice and marking the score on a scoreboard. The player then chooses a scoring category from the 13 available categories. This counts as a _round_, and is marked on the scoreboard. The scoreboard consists of 13 rounds in total. 
Once a scoring category has been used, it cannot be used again in the same game, with the exception of the Yahtzee category (5 of the same dice, which can be used twice. The second time this is used it is worth 100 points).

## Brief outline of the code:
I started by creating all the available scoring _categories_, a _dice roll_ class, and a _category matcher_, to match a dice roll against each of the categories.
It seemed sensible to make an interface, _Category_ which the various categories could implement.

I then wanted to capture a DiceRoll, Category and Score in a _Round_ object. I have made it so that when you initialize a _Round_, it must have a list of available categories (so it knows not to use the same category twice). To capture the available categories I created a _CategoryContainer_. I also decided to put the responsibility of choosing the highest scoring category in this.

Once a round is created it is logged to the _Scoreboard_. 

# Things to improve
 - [ ] The category container just picks the highest scoring category available, by default. It would benefit from better category selection or prioritisation.
 - [ ] Each round is made from 5 dice, but in the real game a player has up to three rolls to choose 5 dice. For example, if a player rolls [3, 3, 3, 5, 1], they may keep the first 3 die and roll the last one again. This might look like [(3), (3), (3), 3, 5]. They can repeat this three times. The third roll (keeping the three three values from the first roll, and another three from the second roll) may look like [(3), (3), (3), (3), 3] = Yahtzee!
