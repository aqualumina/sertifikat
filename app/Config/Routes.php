<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',);
$routes->get('unduh/(:any)/(:any)', 'Acara::export/$1/$2');
$routes->get('/beranda', 'Home::beranda', ['filter' => 'auth']);
$routes->get('/login', 'Auth::indexlogin');
$routes->post('/login/auth', 'Auth::auth');
$routes->get('/register', 'Auth::indexregister');
$routes->post('/login/save', 'Auth::saveRegister');
$routes->get('/logout', 'Auth::logout');



$routes->get('/landing', 'Landing::index');
$routes->post('/landing', 'Landing::search');

$routes->group('acara', ['filter' => 'auth'], function ($rs) {
    $rs->get('/', 'Acara::index');
    $rs->get('format', 'Acara::index');
    $rs->get('create', 'Acara::create');
    $rs->post('create', 'Acara::save');
    $rs->get('template', 'Acara::exportExcel');

    $rs->get('edit/(:any)', 'Acara::edit/$1');
    $rs->post('edit/(:any)', 'Acara::update/$1');
    $rs->post('upload/(:any)', 'Acara::upload/$1');
    $rs->post('uploadbg/(:any)', 'Acara::uploadbgbelakang/$1');
    $rs->get('(:any)', 'Acara::detail/$1');
    $rs->post('import/(:any)', 'Acara::importData/$1');
    $rs->delete('(:num)', 'Acara::delete/$1');
    $rs->get('/', 'Acara::detail/$1');
});


$routes->group('users', ['filter' => 'auth'], function ($rs) {
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

$routes->group('penyelenggara', ['filter' => 'auth'], function ($rs) {
    $rs->get('/', 'Penyelenggara::index');
    $rs->get('create', 'Penyelenggara::create');
    $rs->post('create', 'Penyelenggara::save');
    $rs->get('index', 'Penyelenggara::index');
    $rs->get('create', 'Penyelenggara::create');
    $rs->delete('(:num)', 'Penyelenggara::delete/$1');
    $rs->get('edit/(:any)', 'Penyelenggara::edit/$1');
    $rs->post('edit/(:any)', 'Penyelenggara::update/$1');
});

$routes->group('peserta', ['filter' => 'auth'], function ($rs) {
    $rs->get('(:num)', 'Peserta::index/$1');
    $rs->get('create', 'Peserta::create');
    $rs->post('create', 'Peserta::save');
    $rs->get('index/(:num)', 'Peserta::index/$1');
    $rs->get('create', 'Peserta::create');
    $rs->delete('peserta/(:num)/(:num)', 'Peserta::delete/$1/$2');
    $rs->get('edit/(:any)', 'Peserta::edit/$1');
    $rs->post('edit/(:any)', 'Peserta::update/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
