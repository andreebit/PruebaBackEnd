<?php

// Routes
$app->get('/', 'EmployeeController:index');
$app->get('/api', 'EmployeeApiController:xml');
