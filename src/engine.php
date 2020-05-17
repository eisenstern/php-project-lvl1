<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame($task, $getGameData)
{
    line('Welcome to the Brain Games!');
    line($task);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $counter = 0;
    while ($counter !== 3) {
        [$correctAnswer, $question] = $getGameData();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $counter++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            $counter === 0;
            line("Let's try again, %s!", $name);
            exit;
        }
    }
    line("Congratulations, %s!", $name);
}
