<?php
namespace App\Controllers;

use App\Services\EmployeeService;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class EmployeeController
 * @package Src\Controllers
 */
class EmployeeController
{

    private $employeeService;
    private $container;

    /**
     * EmployeeController constructor.
     * @param EmployeeService $employeeService
     * @param ContainerInterface $container
     */
    public function __construct(EmployeeService $employeeService, ContainerInterface $container)
    {
        $this->employeeService = $employeeService;
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $query = $request->getParam('q', '');
        $employees = $this->employeeService->getAll($query);
        $this->container->renderer->render($response, 'index.phtml', ['employees' => $employees, 'query' => $query]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     */
    public function detail(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $employee = $this->employeeService->getById($id);
        $this->container->renderer->render($response, 'detail.phtml', ['employee' => $employee]);
    }
}
