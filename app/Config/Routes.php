<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Admin::login');

$routes->get('/galeri/(:any)', 'Home::galeri/$1');

$routes->get('/menu/index', 'Menu::index');
$routes->get('/menu/bolu', 'Menu::bolu');
$routes->get('/menu/roti', 'Menu::roti');
$routes->get('/menu/kuekering', 'Menu::kuekering');
$routes->get('/menu/kuebasah', 'Menu::kuebasah');
$routes->get('/menu/kueraya', 'Menu::kueraya');
$routes->get('/menu/cemilan', 'Menu::cemilan');
$routes->get('/menu/(:any)', 'Menu::detail/$1');

$routes->get('/admin/hapusMenu/(:any)', 'Admin::menu');
$routes->delete('/admin/hapusMenu/(:num)', 'Admin::hapusMenu/$1');

$routes->get('/admin/hapusKomentar/(:any)', 'Admin::komentar');
$routes->delete('/admin/hapusKomentar/(:num)', 'Admin::hapusKomentar/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}