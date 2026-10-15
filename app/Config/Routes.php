<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->get('signup', 'Signup::index');
$routes->get('forgot-password', 'ForgotPassword::index');
$routes->get('reset-password', 'ResetPassword::index');
$routes->post('signup/store', 'Signup::store');