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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
use App\Controllers\AsistenController;

$routes->match(
    ['get', 'post'],
    'asisten/simpan',
    [AsistenController::class, 'simpan']
);
$routes->match(
    ['get', 'post'],
    'asisten/update',
    [AsistenController::class, 'update']
);
$routes->match(
    ['get', 'post'],
    'asisten/delete',
    [AsistenController::class, 'delete']
);
$routes->match(
    ['get', 'post'],
    'asisten/search',
    [AsistenController::class, 'search']
);
$routes->get('asisten/login', 'AsistenController::login');
$routes->post('/asisten/check', 'AsistenController::check');
$routes->get('/asisten/home', 'AsistenController::home');
$routes->get('/asisten/logout', 'AsistenController::logout');
$routes->get('/asisten/kembali', 'AsistenController::kembali');
// $routes->post('/asisten/update', 'AsistenController::update');
// $routes->post('/asisten/delete', 'AsistenController::delete');
$routes->get('/', 'AsistenController::login');
$routes->get('/asisten', 'AsistenController::index');
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
