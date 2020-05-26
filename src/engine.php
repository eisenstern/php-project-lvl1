<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playGame($task, $getGameData)
{
    line('Welcome to the Brain Games!');
    line($task);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $roundsQuantity = 3;
    $roundsCounter = 0;
    while ($roundsCounter !== $roundsQuantity) {
        [$correctAnswer, $question] = $getGameData();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $roundsCounter++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
