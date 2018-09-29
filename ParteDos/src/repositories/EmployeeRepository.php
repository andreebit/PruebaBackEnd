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
     * @return \stdClass
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

    public function filterBySalary(int $from, int $to)
    {
        //Todo: filter elements from array
    }
}
