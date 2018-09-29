<?php

require __DIR__ . '/vendor/autoload.php';

$changeString = new \Prueba\ParteUno\ChangeString();

//Test case 123 abcd*3
echo $changeString->build('123 abcd*3') . PHP_EOL;

//Test case **Casa 52
echo $changeString->build('**Casa 52') . PHP_EOL;

//Test case **Casa 52Z
echo $changeString->build('**Casa 52Z') . PHP_EOL;

//Test case a, b, c, d, e, f, g, h, i, j, k, l, m, n, ñ, o, p, q, r, s, t, u, v, w, x, y, z
echo $changeString->build('a, b, c, d, e, f, g, h, i, j, k, l, m, n, ñ, o, p, q, r, s, t, u, v, w, x, y, z') . PHP_EOL;

//Test case A, B, C, D, E, F, G, H, I, J, K, L, M, N, Ñ, O, P, Q, R, S, T, U, V, W, X, Y, Z
echo $changeString->build('A, B, C, D, E, F, G, H, I, J, K, L, M, N, Ñ, O, P, Q, R, S, T, U, V, W, X, Y, Z') . PHP_EOL;
