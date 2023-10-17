<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

$routes->group('acara', function ($rs) {
    $rs->get('/', 'Acara::index');
    $rs->get('create', 'Komik::create');
    $rs->post('create', 'Komik::save');
    $rs->get('edit/(:any)', 'Komik::edit/$1');
    $rs->post('edit/(:any)', 'Komik::update/$1');
    $rs->delete('(:num)', 'Komik::delete/$1');
    $rs->get('(:any)', 'Komik::detail/$1');
    $rs->post('import', 'Komik::importData');
});