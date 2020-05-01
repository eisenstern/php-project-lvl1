<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $counter = 0;
    while ($counter !== 3) {
        $number = rand(1, 30);
        line("Question: %s", $number);
        $answer = prompt('Your answer ');
        $correctAnswerYes = ($number % 2 === 0);
        $correctAnswerNo = ($number % 2 !== 0);
        $userAnswerYes = ($answer === 'yes');
        $userAnswerNo = ($answer === 'no');
        if ($correctAnswerYes && $userAnswerYes || $correctAnswerNo && $userAnswerNo) {
            line('Correct!');
            $counter++;
        } elseif ($correctAnswerYes) {
            line("'%s' is wrong answer ;(. Correct answer was 'yes'.", $answer);
            $counter === 0;
            return line("Let's try again, %s!", $name);
        } elseif ($correctAnswerNo) {
            line("'%s' is wrong answer ;(. Correct answer was 'no'.", $answer);
            $counter === 0;
            return line("Let's try again, %s!", $name);
        }
    }
    line("Congratulations, %s!", $name);
}