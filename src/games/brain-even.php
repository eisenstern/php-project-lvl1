<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\gameStart;

function evenCorrectAnswer($number)
{
    return ($number % 2 === 0);
}

function gameEvenStart()
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';

    $gameParts = function () {
        $number = rand(1, 99);
        $currentTask = $number;
        $correctAnswer = evenCorrectAnswer($number) ? 'yes' : 'no';
        return [$correctAnswer, $currentTask];
    };

    gameStart($task, $gameParts);
}

