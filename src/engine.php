<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gameStart($task, $gameParts)
{
    line('Welcome to the Brain Games!');
    line($task);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $counter = 0;
    while ($counter !== 3) {
        [$correctAnswer, $currentTask] = $gameParts();
        line("Question: %s", $currentTask);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            $counter === 0;
            return line("Let's try again, %s!", $name);
        }
    }
    line("Congratulations, %s!", $name);

}