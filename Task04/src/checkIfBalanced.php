<?php

use App\Stack;

function checkIfBalanced($expression)
{
    $stack = new Stack();
    $openbrackets = array("(","[","{","<");
    $closebrackets = array(")","]","}",">");

    for ($i = 0; $i < strlen($expression); $i++) {
        if (in_array($expression[$i], $openbrackets)) {
            $stack->push($expression[$i]);
        } elseif (in_array($expression[$i], $closebrackets)) {
            $element = $stack->pop();
            if (array_search($element, $openbrackets) != array_search($expression[$i], $closebrackets)) {
                return false;
            }
        } else {
            continue;
        }
    }

    return $stack->isEmpty();
}
