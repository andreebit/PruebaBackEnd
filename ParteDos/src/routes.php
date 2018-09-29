<?php

// Routes
$app->get('/', 'EmployeeController:index');
$app->get('/empleados/{id}', 'EmployeeController:detail');

$app->get('/api', 'EmployeeApiController:xml');
