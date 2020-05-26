<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

function makeInitialProgression($firstElement, $difference, $progressionLength)
{
    for ($counter = 0; $counter < $progressionLength; $counter++) {
        $initialProgression[] = $firstElement + $difference * $counter;
    }
    return $initialProgression;
}

function startProgressionGame()
{
    $task = 'What number is missing in the progression?';
    $getGameData = function () {
        $firstElement = rand(1, 99);
        $difference = rand(1, 20);
        $progressionLength = 10;
        $keyForChange = rand(0, $progressionLength - 1);
        $initialProgression = makeInitialProgression($firstElement, $difference, $progressionLength);
        $progressionWithSkippedElement = $initialProgression;
        $progressionWithSkippedElement[$keyForChange] = "..";
        $question = implode(" ", $progressionWithSkippedElement);
        $correctAnswer = $firstElement + $difference * $keyForChange;
        return [$correctAnswer, $question];
    };
    
    playGame($task, $getGameData);
}
