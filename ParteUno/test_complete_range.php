<?php

require __DIR__ . '/vendor/autoload.php';

$completeRange = new \Prueba\ParteUno\CompleteRange();

//Test case [1, 2, 4, 5]
print_r($completeRange->build([1, 2, 4, 5]));

//Test case [2, 4, 9]
print_r($completeRange->build([2, 4, 9]));

//Test case [55, 58, 60]
print_r($completeRange->build([55, 58, 60]));




//Test Exception: Se necesitan al menos dos números.
try {
    $completeRange->build([]);
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

//Test Exception: Solo se permiten números enteros.
try {
    $completeRange->build([1, 2.5]);
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

//Test Exception: Solo se permiten números enteros positivos.
try {
    $completeRange->build([-1, 5]);
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

//Test Exception: Solo se permiten números ordenados correlativamente.
try {
    $completeRange->build([5, 3]);
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
