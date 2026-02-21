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

// CATEGORY
$routes->get('/categories', 'CategoryController::index');
$routes->get('/categories/create', 'CategoryController::create');
$routes->post('/categories/store', 'CategoryController::store');
$routes->get('/categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('/categories/update/(:num)', 'CategoryController::update/$1');
$routes->post('/categories/delete/(:num)', 'CategoryController::delete/$1');

// ARTICLE
$routes->get('/', 'ArticleController::index');
$routes->get('/articles/create', 'ArticleController::create');
$routes->post('/articles/store', 'ArticleController::store');
$routes->get('/articles/edit/(:num)', 'ArticleController::edit/$1');
$routes->post('/articles/update/(:num)', 'ArticleController::update/$1');
$routes->post('/articles/delete/(:num)', 'ArticleController::delete/$1');
$routes->get('/article/(:num)', 'ArticleController::detail/$1');

// POSTS
$routes->get('/posts', 'PostController::index');
$routes->get('/posts/create', 'PostController::create');
$routes->post('/posts/store', 'PostController::store');
$routes->get('/posts/edit/(:num)', 'PostController::edit/$1');
$routes->post('/posts/update/(:num)', 'PostController::update/$1');
$routes->post('/posts/delete/(:num)', 'PostController::delete/$1'); 
$routes->get('/post/(:num)', 'PostController::detail/$1');


