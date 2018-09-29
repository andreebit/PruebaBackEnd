<?php

namespace App\Repositories;

/**
 * Class EmployeeRepository
 */
class EmployeeRepository
{

    private $collection = [];

    /**
     * EmployeeRepository constructor.
     * @param array $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param null $filter
     * @return array
     */
    public function getAll($filter = null)
    {
        if (is_null($filter) || empty(trim($filter))) {
            return $this->collection;
        }

        $filtered = array_filter($this->collection, function ($item) use ($filter) {
            if (strpos($item->email, $filter) !== false) {
                return true;
            }
            return false;
        });

        return $filtered;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function getById(string $id)
    {
        $filtered = array_filter($this->collection, function ($item) use ($id) {
            if ($item->id === $id) {
                return true;
            }
            return false;
        });

        if (count($filtered) === 0) {
            throw new \Exception('No se encontró al empleado.');
        }

        return end($filtered);
    }

    /**
     * @param int $from
     * @param int $to
     * @return array
     * @throws \Exception
     */
    public function filterBySalary(int $from, int $to)
    {
        if ($from < 0) {
            throw new \Exception('El valor inicial debe ser mayor o igual a cero.');
        }

        if ($to < $from) {
            throw new \Exception('El valor final debe ser mayor o igual al inicial.');
        }

        $filtered = array_filter($this->collection, function ($item) use ($from, $to) {
            $clearedSalary = str_replace('$', '', $item->salary);
            $clearedSalary = str_replace(',', '', $clearedSalary);

            if ($clearedSalary >= $from && $clearedSalary <= $to) {
                return true;
            }

            return false;
        });

        return $filtered;
    }
}
