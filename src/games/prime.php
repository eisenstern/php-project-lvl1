<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }
    for ($counter = 2; $counter <= floor($number / 2); $counter++) {
        if ($number % $counter === 0) {
            return false;
        }
    }
    return true;
}

function startPrimeGame()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getGameData = function () {
        $question = rand(1, 99);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$correctAnswer, $question];
    };
    
    playGame($task, $getGameData);
}
