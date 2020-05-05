<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\startGame;

function findAllDivisors($number)
{
    $divisors = [];
    for ($counter = 1; $counter <= floor($number / 2); $counter++) {
        if ($number % $counter === 0) {
            $divisors[] = $counter;
        }
    }
    $divisors[] = $number;
    return $divisors;
}

function findCommonDivisor($number1, $number2)
{
    $allDivisors1 = findAllDivisors($number1);
    $allDivisors2 = findAllDivisors($number2);
    for ($counter = count($allDivisors1) - 1; $counter >= 0; $counter--) {
        if (in_array($allDivisors1[$counter], $allDivisors2)) {
            return $allDivisors1[$counter];
        }
    }
}

function startGcdGame()
{
    $task = 'Find the greatest common divisor of given numbers.';
    

    $getGameParts = function () {
        $number1 = rand(1, 50);
        $number2 = rand(50, 99);
        $currentTask = $number1 . " " . $number2;
        $correctAnswer = findCommonDivisor($number1, $number2);
        return [$correctAnswer, $currentTask];
    };
    
    startGame($task, $getGameParts);
}
