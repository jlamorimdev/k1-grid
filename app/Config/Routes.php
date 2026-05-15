<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    $routes->group('users', function($routes) {
        $routes->get('/', 'User::index');
        $routes->get('create', 'User::createUser');
        $routes->get('edit/(:num)', 'User::editUser/$1');
        $routes->post('new', 'User::create');
        $routes->post('update/(:num)', 'User::update/$1');
        $routes->get('delete/(:num)', 'User::delete/$1');
    });

    $routes->group('teams', function($routes) {
        $routes->get('/', 'Team::index');
        $routes->get('create', 'Team::createTeam');
        $routes->get('edit/(:num)', 'Team::editTeam/$1');
        $routes->post('new', 'Team::create');
        $routes->post('update/(:num)', 'Team::update/$1');
        $routes->get('delete/(:num)', 'Team::delete/$1');
    });
});

$routes->get('/', 'Home::index');