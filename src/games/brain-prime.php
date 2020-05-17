<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\startGame;

function isPrime($number)
{
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
        $number = rand(1, 99);
        $question = $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        return [$correctAnswer, $question];
    };
    
    startGame($task, $getGameData);
}
