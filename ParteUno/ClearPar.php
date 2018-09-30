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
     * @return mixed|string
     */
    public function build(string $string)
    {
        $result = array_reduce(str_split($string), function ($acc, $item) {

            if ($item != self::OPEN_PARENTHESIS && $item != self::CLOSE_PARENTHESIS) {
                throw new \Exception('Solo se permiten paréntesis.');
            }

            if (!is_null($acc)) {
                $lastChar = substr($acc, strlen($acc) - 1);
                if ($item != $lastChar) {
                    $acc .= $item;
                }
            } else {
                if ($item == self::OPEN_PARENTHESIS) {
                    $acc .= $item;
                }
            }

            return $acc;
        });

        return (strlen($result) >= 2) ? $result : '';
    }
}
