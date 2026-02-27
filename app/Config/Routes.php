<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('', 'Dashboard::index');
    $routes->get('/dashboard', 'Dashboard::index');

    $routes->group('users', function($routes) {
        $routes->get('/', 'User::index');
        $routes->post('new', 'User::create');
        $routes->post('update/(:num)', 'User::update/$1');
        $routes->get('delete/(:num)', 'User::delete/$1');
    });
});

$routes->get('/', 'Home::index');