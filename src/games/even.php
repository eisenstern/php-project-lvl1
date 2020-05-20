<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

function isEven($number)
{
    return ($number % 2 === 0);
}

function startEvenGame()
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getGameData = function () {
        $question = rand(1, 99);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$correctAnswer, $question];
    };

    playGame($task, $getGameData);
}
