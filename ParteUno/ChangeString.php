<?php

namespace Prueba\ParteUno;

/**
 * Class ChangeString
 * @package Prueba\ParteUno
 */
class ChangeString
{

    /**
     * Es posible generar el alfabeto dinámicamente con range('a', 'z'),
     * pero para evitar problemas con la ñ, preferí usar constantes.
     */
    const ALPHABET = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r',
        's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
        'L', 'M', 'N', 'Ñ', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    const ALPHABET_REPLACE = [
        'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r',
        's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'a', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
        'L', 'M', 'N', 'Ñ', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'A'
    ];

    /**
     * @param string $string
     * @return string
     */
    public function build(string $string)
    {
        return $string = strtr($string, array_combine(self::ALPHABET, self::ALPHABET_REPLACE));
    }
}
