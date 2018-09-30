<?php

require __DIR__ . '/vendor/autoload.php';

$clearPar = new \Prueba\ParteUno\ClearPar();

//Test case ()())()
echo $clearPar->build('()())()') . PHP_EOL;

//Test case ()(()
echo $clearPar->build('()(()') . PHP_EOL;

//Test case )(
echo $clearPar->build(')(') . PHP_EOL;

//Test case ((()
echo $clearPar->build('((()') . PHP_EOL;

//Test case (((((()))
echo $clearPar->build('(((((())(()') . PHP_EOL;

//Test case (()()()()(()))))())((())
echo $clearPar->build('(()()()()(()))))())((())') . PHP_EOL;


//Test Exception: Solo se permiten paréntesis.
try {
    $clearPar->build('((a()');
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}