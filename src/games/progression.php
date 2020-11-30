<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

function makeProgression($firstElement, $difference, $progressionLength)
{
    for ($counter = 0; $counter < $progressionLength; $counter++) {
        $progression[] = $firstElement + $difference * $counter;
    }
    return $progression;
}

function startProgressionGame()
{
    $task = 'What number is missing in the progression?';
    $getGameData = function () {
        $firstElement = rand(1, 99);
        $difference = rand(1, 20);
        $progressionLength = 10;
        $progression = makeProgression($firstElement, $difference, $progressionLength);
        $keyForChange = array_rand($progression);
        $progressionCopy = $progression;
        $progressionCopy[$keyForChange] = "..";
        $question = implode(" ", $progressionCopy);
        $correctAnswer = $progression[$keyForChange];
        return [$correctAnswer, $question];
    };
    
    playGame($task, $getGameData);
}
