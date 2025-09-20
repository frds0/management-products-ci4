<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Dashboard
$routes->get('/', 'Home::index');

// Categories
$routes->get('/categories', 'Categories::index');
$routes->get('/categories/create', 'Categories::create');
$routes->post('/categories/insert', 'Categories::insert');
$routes->get('/categories/edit/(:num)', 'Categories::edit/$1');
$routes->post('/categories/update/(:num)', 'Categories::update/$1');
$routes->post('/categories/delete/(:num)', 'Categories::delete/$1');

// Products
$routes->post('/products/ajaxList', 'Products::ajaxList');
$routes->get('/products', 'Products::index');
$routes->get('/products/create', 'Products::create');
$routes->post('/products/insert', 'Products::insert');
$routes->get('/products/edit/(:num)', 'Products::edit/$1');
$routes->post('/products/update/(:num)', 'Products::update/$1');
$routes->post('/products/delete/(:num)', 'Products::delete/$1');
