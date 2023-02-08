<?php

namespace BrainGames\PlayCalc;

use function cli\line;
use function cli\prompt;

function startPlayCalc()
{
    $operators = array("+", "-", "*");
    $correctAnswersCount = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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

        if ($correctAnswersCount === 3) {
            line('Congratulations, %s', $name);
        } 

        if ((integer)$userVersion === (integer)$result) {
            line("Correct!");
            $correctAnswersCount++;
        } else {
            line("%s is wrong answer ;(. Correct answer was %s.", $userVersion, $result);
            line("Let's try again, %s!", $name);
            break;
        }
}

}