<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['EmployeeRepository'] = function ($c) {
    $settings = $c->get('settings');
    $collection = json_decode(file_get_contents($settings['employees_json_file']));
    return new \App\Repositories\EmployeeRepository($collection);
};

$container['EmployeeService'] = function ($c) {
    return new \App\Services\EmployeeService($c->get('EmployeeRepository'));
};

$container['EmployeeController'] = function ($c) {
    return new \App\Controllers\EmployeeController($c->get('EmployeeService'), $c);
};

$container['EmployeeApiController'] = function ($c) {
    return new \App\Controllers\EmployeeApiController($c->get('EmployeeService'), $c);
};
