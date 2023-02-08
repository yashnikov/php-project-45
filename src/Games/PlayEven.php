<?php

namespace BrainGames\PlayEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\displayWelcomeScreen;
use function BrainGames\Engine\displayWrongAnswerMessage;
use function BrainGames\Engine\displayCorrectAnswerMessage;

function startPlayEven()
{
    displayWelcomeScreen();

    $correctAnswersCount = 0;

    function isEven($num)
    {
        if ($num % 2 == 0) {
            return true;
        }
        return false;
    }

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($x = 0; $x < 3; $x++) {
        $number = rand(1, 100);
        line('Question: %s.', $number);
        $answer = prompt('Your answer');

        if (isEven($number) === true) {
            if ($answer === "yes") {
                line('Correct!');
                $correctAnswersCount++;
                if ($correctAnswersCount === 3) {
                    displayCorrectAnswerMessage();
                }
            } else {
                line("'no' is wrong answer ;(. Correct answer was 'yes'.");
                displayWrongAnswerMessage();
                break;
            }
        }

        if (isEven($number) === false) {
            if ($answer === "no") {
                line('Correct!');
                $correctAnswersCount++;
            } else {
                line("'yes' is wrong answer ;(. Correct answer was 'no'.");
                displayWrongAnswerMessage();
                break;
            }
        }

    }
}