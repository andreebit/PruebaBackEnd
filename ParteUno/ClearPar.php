<?php

namespace Prueba\ParteUno;

/**
 * Class ClearPar
 * @package Prueba\ParteUno
 */
class ClearPar
{

    const OPEN_PARENTHESIS = '(';
    const CLOSE_PARENTHESIS = ')';

    /**
     * @param string $string
     * @return string
     */
    public function build(string $string)
    {
        $string = array_reduce(str_split($string), function ($acc, $item) {

            if ($item != self::OPEN_PARENTHESIS && $item != self::CLOSE_PARENTHESIS) {
                throw new \Exception('Solo se permiten paréntesis.');
            }

            $acc .= $item;
            return $acc;
        });

        $pattern = sprintf('/\%s\%s/', self::OPEN_PARENTHESIS, self::CLOSE_PARENTHESIS);
        preg_match_all($pattern, $string, $matches);

        return implode($matches[0]);
    }
}
