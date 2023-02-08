<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
global $name;
$name = "";

function displayWelcomeScreen()
{
    global $name;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function displayWrongAnswerMessage()
{
    global $name;
    line("Let's try again, %s!", $name);
}

function displayCorrectAnswerMessage()
{
    global $name;
    line("Congratulations, %s!", $name);
}
