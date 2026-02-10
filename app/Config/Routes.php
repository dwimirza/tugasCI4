<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/berita/details', 'Berita::details');
// $routes->get('/Home', 'Home::index');

// Student Routes
$routes->get('/create', 'StudentController::create');
$routes->post('/store', 'StudentController::store');
$routes->get('/list', 'StudentController::home');
$routes->get('/wishlist', 'Wishlist::index');