<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingCtrl::index');
$routes->get('/auth', 'AuthCtrl::index');
$routes->get('/admin', 'AdminCtrl::index');
