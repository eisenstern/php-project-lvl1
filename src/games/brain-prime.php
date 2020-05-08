<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\startGame;

function isPrime($number)
{
    $divisors = [];
    for ($counter = 1; $counter <= floor($number / 2); $counter++) {
        if ($number % $counter === 0) {
            $divisors[] = $counter;
        }
    }
    if ($divisors == [1]) {
        return true;
    }
    return false;
}

function startPrimeGame()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    

    $getGameParts = function () {
        $number = rand(1, 99);
        $currentTask = $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        return [$correctAnswer, $currentTask];
    };
    
    startGame($task, $getGameParts);
}
