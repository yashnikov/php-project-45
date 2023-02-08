<?php

namespace BrainGames\PlayCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\displayWelcomeScreen;
use function BrainGames\Engine\displayWrongAnswerMessage;
use function BrainGames\Engine\displayCorrectAnswerMessage;


function startPlayCalc()
{
    $operators = array("+", "-", "*");
    $correctAnswersCount = 0;

    displayWelcomeScreen();

    for ($x = 0; $x < 3; $x++) {
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
        $operator = $operators[array_rand($operators)];
        $result = 0;


        line('What is the result of the expression?');
        line('Question: %s %s %s', $number1, $operator, $number2);
        $userVersion = prompt('Your answer');

        if ($operator === "*") {
            $result = $number1 * $number2;
        }
        if ($operator === "-") {
            $result = $number1 - $number2;
        }
        if ($operator === "+") {
            $result = $number1 + $number2;
        }

        if ((integer)$userVersion === (integer)$result) {
            line("Correct!");
            $correctAnswersCount++;
            if ($correctAnswersCount === 3) {
                displayCorrectAnswerMessage();
            } 
        } else {
            line("%s is wrong answer ;(. Correct answer was %s.", $userVersion, $result);
            displayWrongAnswerMessage();
            break;
        }
    }

}
