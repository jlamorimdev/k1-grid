<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('', 'DashboardController::index');
    $routes->get('dashboard', 'DashboardController::index');

    $routes->group('users', function($routes) {
        $routes->get('/', 'UserController::index');
        $routes->get('create', 'UserController::createUser');
        $routes->get('edit/(:num)', 'UserController::editUser/$1');
        $routes->post('new', 'UserController::create');
        $routes->post('update/(:num)', 'UserController::update/$1');
        $routes->get('delete/(:num)', 'UserController::delete/$1');
    });

    $routes->group('teams', function($routes) {
        $routes->get('/', 'TeamController::index');
        $routes->get('create', 'TeamController::createTeam');
        $routes->get('edit/(:num)', 'TeamController::editTeam/$1');
        $routes->post('new', 'TeamController::create');
        $routes->post('update/(:num)', 'TeamController::update/$1');
        $routes->get('delete/(:num)', 'TeamController::delete/$1');
    });

    $routes->group('championships', function($routes) {
        $routes->get('/', 'ChampionshipController::index');
        $routes->get('create', 'ChampionshipController::createChampionship');
        $routes->get('edit/(:num)', 'ChampionshipController::editChampionship/$1');
        $routes->post('new', 'ChampionshipController::create');
        $routes->post('update/(:num)', 'ChampionshipController::update/$1');
        $routes->get('delete/(:num)', 'ChampionshipController::delete/$1');
    });
});

$routes->get('/', 'Home::index');