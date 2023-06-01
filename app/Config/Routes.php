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
$routes->get('/', 'Home::index');
// $routes->get('/hello', 'Sitecontroller::simple');

// use App\Controllers\Pages;
// // $routes->get('pages', [Pages::class, 'index']);
// // $routes->get('(:segment)', [Pages::class, 'view']);

// use App\Controllers\News;
// $routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
// $routes->get('news', [News::class, 'index']);
// $routes->get('news/(:segment)', [News::class, 'view']);

// $routes->get('news/edit/(:segment)', [News::class, 'edit']);
// $routes->post('news/update', [News::class, 'update']);
// $routes->get('news/delete/(:segment)', [News::class, 'delete']);

// Tuto 4
$routes->get('lucky-number', 'LuckyNumber::index'); //q1
$routes->get('table-alternative-row-bg', 'TableAlt::index'); //q2
// $routes->get('credit-card', 'CreditCard::index'); //q3
$routes->get('credit-card', 'FormController::index'); //q3
$routes->post('save-credit-card', 'FormController::saveFormData'); //q3

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
