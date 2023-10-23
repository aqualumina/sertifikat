<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/','Home::index', ['filter' => 'auth']);
$routes->get('/login', 'Auth::indexlogin');
$routes->post('/login/auth', 'Auth::auth');
$routes->get('/register', 'Auth::indexregister');
$routes->post('/login/save', 'Auth::saveRegister');
$routes->get('/logout', 'Auth::logout');



$routes->group('acara',['filter' => 'auth'], function ($rs) {
    $rs->get('/', 'Acara::index');
    $rs->get('create', 'Acara::create');
    $rs->post('create', 'Acara::save');
    $rs->get('edit/(:any)', 'Acara::edit/$1');
    $rs->post('edit/(:any)', 'Acara::update/$1');
    $rs->delete('(:num)', 'Acara::delete/$1');
    $rs->get('(:any)', 'Acara::detail/$1');
    $rs->post('import', 'Acara::importData');
});


$routes->group('users',['filter' => 'auth'], function ($rs) {
    // ['filter' =>'role:Admin,Owner1,Owner2']
    $rs->get('/', 'Users::index');
    $rs->get('create', 'Users::create');
    $rs->post('create', 'Users::save');
    $rs->get('index', 'Users::index');
    $rs->get('create', 'Users::create');
    $rs->delete('(:num)', 'Users::delete/$1');
    $rs->get('edit/(:any)', 'Users::edit/$1');
    $rs->post('edit/(:any)', 'Users::update/$1');
});