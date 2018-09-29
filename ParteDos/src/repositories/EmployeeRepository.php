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
        if (is_null($filter)) {
            return $this->collection;
        }
    }

    public function getById(string $id)
    {
        //Todo: get element by id
    }

    public function filterBySalary(int $from, int $to)
    {
        //Todo: filter elements from array
    }
}
