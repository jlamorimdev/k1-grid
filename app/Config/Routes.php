<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
});

$routes->get('/', 'Home::index');