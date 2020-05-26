<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

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

function findGreatestCommonDivisor($number1, $number2)
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
    $getGameData = function () {
        $number1 = rand(1, 50);
        $number2 = rand(50, 99);
        $question = "{$number1} {$number2}";
        $correctAnswer = findGreatestCommonDivisor($number1, $number2);
        return [$correctAnswer, $question];
    };
    
    playGame($task, $getGameData);
}
