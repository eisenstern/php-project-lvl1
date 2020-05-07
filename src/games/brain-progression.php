<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

function findInitialProgression($firstElement, $difference)
{
    $initialProgression[] = $firstElement;
    for ($count = 1, $element = $firstElement; $count <= 10; $count++) {
        $initialProgression[] = $element + $difference;
        $element += $difference;
    }
    return $initialProgression;
}

function startProgressionGame()
{
    $task = 'What number is missing in the progression?';
    

    $getGameParts = function () {
        $firstElement = rand(1, 99);
        $difference = rand(1, 20);
        $keyForChange = rand(0, 9);
        $initialProgression = findInitialProgression($firstElement, $difference);
        $missingElementProgression = $initialProgression;
        $missingElementProgression[$keyForChange] = "..";
        $currentTask = implode(" ", $missingElementProgression);
        $correctAnswer = $initialProgression[$keyForChange];
        return [$correctAnswer, $currentTask];
    };
    
    startGame($task, $getGameParts);
}
