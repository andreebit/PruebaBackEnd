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
     * @return Response
     * @throws \Exception
     */
    public function xml(Request $request, Response $response)
    {
        $from = $request->getParam('from', 0);
        $to = $request->getParam('to', $from);

        $employees = json_decode(json_encode($this->employeeService->filterBySalary($from, $to)), true);

        $xmlData = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data></data>');
        $this->arrayToXml($employees, $xmlData);

        return $response->withHeader('Content-Type', 'text/xml')->write($xmlData->asXML());
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
