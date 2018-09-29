<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

/**
 * Class EmployeeService
 * @package Src\Services
 */
class EmployeeService
{

    private $employeeRepository;

    /**
     * EmployeeService constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param null $filter
     * @return array
     */
    public function getAll($filter = null)
    {
        return $this->employeeRepository->getAll($filter);
    }

    /**
     * @param string $id
     * @return \stdClass
     * @throws \Exception
     */
    public function getById(string $id)
    {
        return $this->employeeRepository->getById($id);
    }

    /**
     * @param int $from
     * @param int $to
     * @return array
     * @throws \Exception
     */
    public function filterBySalary(int $from, int $to)
    {
        return $this->employeeRepository->filterBySalary($from, $to);
    }
}
