<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\startGame;

function calcCorrectAnswer($operator, $number1, $number2)
{
    switch ($operator) {
        case '+':
            $correctAnswer = $number1 + $number2;
            break;
        case '-':
            $correctAnswer = $number1 - $number2;
            break;
        case '*':
            $correctAnswer = $number1 * $number2;
            break;
    }
    return $correctAnswer;
}

function startCalcGame()
{
    $task = 'What is the result of the expression?';
    

    $getGameParts = function () {
        $operatorsList = ['+', '-', '*'];
        $operator = $operatorsList[array_rand($operatorsList)];
        $number1 = rand(1, 30);
        $number2 = rand(1, 30);
        $currentTask = $number1 . $operator . $number2;
        $correctAnswer = calcCorrectAnswer($operator, $number1, $number2);
        return [$correctAnswer, $currentTask];
    };
    
    startGame($task, $getGameParts);
}
