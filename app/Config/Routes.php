<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Auth::index');

    // Routes that require authentication (logged-in user) will be defined here
$routes->get('/', 'Auth::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('register', 'RegisterController::index');
$routes->get('login', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->post('login/auth', 'Auth::login');
$routes->post('register', 'RegisterController::processRegistration');

$routes->get('/customer', 'Customer::index');
$routes->add('/customer/create', 'Customer::store');
$routes->add('/customer/edit/(:segment)', 'Customer::edit/$1');
$routes->get('/customer/delete/(:segment)', 'Customer::delete/$1');

$routes->get('pesanan', 'Pesanan::index');
$routes->post('pesanan/store', 'Pesanan::store');
$routes->post('pesanan/edit/(:segment)', 'Pesanan::edit/$1');
$routes->get('pesanan/delete/(:segment)', 'Pesanan::delete/$1');

$routes->get('/laporan', 'Reporttransaksi::index');
$routes->get('/pdf_view', 'Reporttransaksi::view');
$routes->get('/generate', 'Reporttransaksi::generate');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}