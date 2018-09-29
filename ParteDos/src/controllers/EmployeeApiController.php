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
class EmployeeApiController
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
    public function xml(Request $request, Response $response)
    {
        $from = $request->getParam('from');
        $to = $request->getParam('to');

        $employees = $this->employeeService->getAll();

        $xmlData = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $this->arrayToXml($employees, $xmlData);

        echo $xmlData->asXML();
    }

    /**
     * @param $data
     * @param $xmlData
     */
    private function arrayToXml($data, &$xmlData)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xmlData->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xmlData->addChild($key, htmlspecialchars($value));
            }
        }
    }
}
