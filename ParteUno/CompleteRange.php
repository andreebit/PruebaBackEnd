<?php

namespace Prueba\ParteUno;

/**
 * Class CompleteRange
 * @package Prueba\ParteUno
 */
class CompleteRange
{

    /**
     * @param array $collection
     * @return array
     * @throws \Exception
     */
    public function build(array $collection)
    {
        $previous = 0;
        $resultArray = array_filter($collection, function ($item) use (&$previous) {
            if (!is_int($item)) {
                throw new \Exception('Solo se permiten números enteros.');
            }

            if ($item <= 0) {
                throw new \Exception('Solo se permiten números enteros positivos.');
            }

            if ($item <= $previous) {
                throw new \Exception('Solo se permiten números enteros ordenados correlativamente.');
            }

            $previous = $item;
            return true;
        });

        if (count($resultArray) < 2) {
            throw new \Exception('Se necesitan al menos dos números enteros.');
        }

        $min = $resultArray[0];
        $max = end($resultArray);

        return range($min, $max);
    }
}
