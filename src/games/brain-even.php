<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\startGame;

function isEven($number)
{
    return ($number % 2 === 0);
}

function startEvenGame()
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';

    $getGameParts = function () {
        $number = rand(1, 99);
        $currentTask = $number;
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        return [$correctAnswer, $currentTask];
    };

    startGame($task, $getGameParts);
}
