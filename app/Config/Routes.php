<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

/** @var RouteCollection $routes */

// Public pages (no auth required)
$routes->get('/', 'Welcome::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'Pages::about');
$routes->get('login', 'Auth::login');

// Auth routes
$routes->post('auth/authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

// Protected CRUD routes (require auth)
$routes->get('tasks/new', 'Tasks::new');
$routes->post('tasks/store', 'Tasks::store');
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->get('tasks/delete/(:num)', 'Tasks::delete/$1');
