<?php

use App\Stack;

function runTest()
{
    $stack1 = new Stack(1);
    $stack2 = new Stack(1);

    //Comparing test
    echo "Ожидается: false, true" . PHP_EOL;
    echo "Получено: " . json_encode($stack1 === $stack2) . ", " .
    json_encode($stack1 == $stack2) . PHP_EOL;

    //"Push" test
    $stack1->push(2, 3);
    echo "Ожидается: [1->2->3]" . PHP_EOL;
    echo "Получено: " . $stack1 . PHP_EOL;

    //"Pop" test
    echo "Ожидается: 1, [], " . PHP_EOL;
    echo "Получено: " . $stack2->pop() . ", " . $stack2 . ", " .
    $stack2->pop() . PHP_EOL;

    //"Top" test
    echo "Ожидается: 3" . PHP_EOL;
    echo "Получено: " . $stack1->top() . PHP_EOL;

    //"Copy" test
    echo "Ожидается: [1->2->3]" . PHP_EOL;
    echo "Получено: " . $stack1->copy() . PHP_EOL;

    //"isEmpty" test
    echo "Ожидается: false, true" . PHP_EOL;
    echo "Получено: " . json_encode($stack1->isEmpty()) . ", " .
    json_encode($stack2->isEmpty()) . PHP_EOL;

    //"chekhIfBalanced" test
    echo "Ожидается: true, false, false" . PHP_EOL;
    echo "Получено: " . json_encode(checkIfBalanced("(ab[cd{}])")) . ", " .
    json_encode(checkIfBalanced("(ab[cd{})")) . ", " .
    json_encode(checkIfBalanced("(ab[cd{]})")) . PHP_EOL;
}
