<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

function findGreatestCommonDivisor($number1, $number2)
{
    while ($number1 != 0 && $number2 != 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }
    $gcd = $number1 + $number2;
    return $gcd;
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
