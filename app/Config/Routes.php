<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Welcome::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'Pages::about');
?>	