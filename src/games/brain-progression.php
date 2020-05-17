<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

function findInitialProgression($firstElement, $difference, $progressionLength)
{
    $initialProgression[] = $firstElement;
    for ($counter = 1, $element = $firstElement; $counter <= $progressionLength; $counter++) {
        $initialProgression[] = $element + $difference;
        $element += $difference;
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
        $initialProgression = findInitialProgression($firstElement, $difference, $progressionLength);
        $progressionWithSkippedElement = $initialProgression;
        $progressionWithSkippedElement[$keyForChange] = "..";
        $question = implode(" ", $progressionWithSkippedElement);
        $correctAnswer = $initialProgression[$keyForChange];
        return [$correctAnswer, $question];
    };
    
    startGame($task, $getGameData);
}
