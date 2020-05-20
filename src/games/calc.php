<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

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
    $getGameData = function () {
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
        $number1 = rand(1, 30);
        $number2 = rand(1, 30);
        $question = "{$number1} {$operator} {$number2}";
        $correctAnswer = calcCorrectAnswer($operator, $number1, $number2);
        return [$correctAnswer, $question];
    };
    
    playGame($task, $getGameData);
}
